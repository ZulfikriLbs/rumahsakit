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
    // [
    //     'class'=>'\kartik\grid\DataColumn',
    //     'attribute'=>'id_video',
    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'id_sub_bab',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'judul',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'deskripsi',
        'format' => 'raw',
        
    ],
    // [
    //     'class'=>'\kartik\grid\DataColumn',
    //     'attribute'=>'hashcode',
    // ],
    // [
    //     'class'=>'\kartik\grid\DataColumn',
    //     'attribute'=>'link',
    //     'format' => 'raw',
    //     'value' => function($model){
    //         return '<object type="video/mp4" data="'.Url::to(['video/video', 'hashCode' => $model->hashcode]).'" width="300" height="300" />';
    //     }
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'created_at',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'updated_at',
    // ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'template'=>'{modal-video}{view}{update}{delete}',
        /*'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
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
            'modal-video' => function ($url,$model){
                return Html::a('<span class="glyphicon glyphicon-play"></span>&nbsp;Video', Url::to(['video/modal-video','hashCode'=>$model->hashcode]), ['class' => 'btn btn-warning btn-block', 'role'=>'modal-remote']);
            },
        ]
    ],

];   