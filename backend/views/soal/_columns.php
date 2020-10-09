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
    /*[
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'id_bab',
    ],*/
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'soal',
        'format' => 'raw',
        'value' => function($model){
            $return = '';
            if ($model->hashsoal){
                $return .= '<div class="row"><div class="col-md-12">'.Html::img(Url::to(['soal/gambar', 'hashCode' => $model->hashsoal]), ['height' => '200px']).'</div></div>';
            }
            $return .= '<div class="row"><div class="col-md-12">'.$model->soal.'</div></div>';
            return $return;
        }
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'pil_a',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'pil_b',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'pil_c',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'pil_d',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'kunci',
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'template'=>'{modal-video}{view}{update}{delete}{pembahasan}',
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
            'pembahasan' => function ($url, $model){
                return Html::a('<i class="fas fa-edit"></i>&nbsp;Pembahasan', Url::to(['pembahasan/create', 'idSoal' => $model->id_soal]), ['class' => 'btn btn-success btn-block', 'role'=>'modal-remote']);
            },
            
        ]
        /*'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete', 
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                          'data-confirm-title'=>'Are you sure?',
                          'data-confirm-message'=>'Are you sure want to delete this item'], */
    ],

];   