<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;

return [
    
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'username',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'email',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'roles',
        'format' => 'raw',
        'value' => function ($data) {
            $roles = [];
            foreach ($data->roles as $role) {
                $roles[] = $role->item_name;
            }
            return Html::a(implode(', ', $roles), ['view', 'id' => $data->id]);
        }
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'status',
        'format' => 'raw',
        'options' => [
            'width' => '80px',
        ],
        'value' => function ($data) {
            if ($data->status == 10)
                return "<span class='label label-primary'>" . 'Aktif' . "</span>";
            else
                return "<span class='label label-danger'>" . 'Non-Aktif' . "</span>";
        }
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'created_at',
        'format' => ['date', 'php:d M Y H:i:s'],
                'options' => [
                    'width' => '120px',
                ],
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'updated_at',
        'format' => ['date', 'php:d M Y H:i:s'],
                'options' => [
                    'width' => '120px',
                ],
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'template'=>'{update}{delete}',
        /*
        'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete', 
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                          'data-confirm-title'=>'Are you sure?',
                          'data-confirm-message'=>'Are you sure want to delete this item'], */

        'buttons' => [
            'view' => function ($url, $model){
                return Html::a('Lihat', $url, ['class' => 'btn btn-info btn-block', 'role'=>'modal-remote']);
            },
            'update' => function ($url, $model){
                return Html::a('Ubah', $url, ['class' => 'btn btn-success btn-block', 'role'=>'modal-remote']);
            },
            'delete' => function ($url, $model){
                return Html::a('Hapus', $url, [
                    'class' => 'btn btn-danger btn-block', 
                    'role'=>'modal-remote',
                    'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                    'data-request-method'=>'post',
                    'data-toggle'=>'tooltip',
                    'data-confirm-title'=>'Kamu yakin?',
                    'data-confirm-message'=>'Apakah kamu yakin ingin menghapus data ini?'
                ]);
            },
            
        ]
    ],

];   