<?php
use yii\helpers\Url;
use yii\helpers\Html;

return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'id_kelas',
        'value' => function($model){
            return $model->kelas->nm_kelas;
        }
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'kd_bab',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'judul',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'deskripsi',
    ],
    [
        
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'template'=>'{view}{update}{delete}',
        /*'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'viewOptions'=>['role'=>'modal-remote','title'=>'Lihat','data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>'Ubah', 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Hapus', 
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                          'data-confirm-title'=>'Kamu yakin?',
                          'data-confirm-message'=>'Apakah kamu yakin menghapus data ini?'], */

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