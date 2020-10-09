<?php
use yii\helpers\Url;
use yii\helpers\Html;

return [
    
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'nm_kelas',
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'template'=>'{view}{update}{delete}',
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
                return Html::a('<i class="fas fa-book"></i>&nbsp;Lihat', $url, ['class' => 'btn btn-info btn-block', 'role'=>'modal-remote']);
            },
            'update' => function ($url, $model){
                return Html::a('<i class="fas fa-edit"></i>&nbsp;Ubah', $url, ['class' => 'btn btn-success btn-block', 'role'=>'modal-remote']);
            },
            'delete' => function ($url, $model){
                return Html::a('<i class="fas fa-trash"></i>&nbsp;Hapus', $url, [
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