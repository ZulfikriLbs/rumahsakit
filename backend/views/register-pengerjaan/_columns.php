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
        'attribute'=>'id_register',
        //'group' => true,  // enable grouping
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'id_bab',
        'label' => 'Bab',
        'format' => 'raw',
        'value' => function($model){
            return $model->subBab->bab->judul;
        }
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'id_sub_bab',
        'label' => 'Sub Bab',
        'format' => 'raw',
        'value' => function($model){
            return $model->subBab->judul;
        }
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'jumlah',
        'value' => function($model){
            return $model->getTaRegisterPengerjaanRincians()->count();
        }
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'poin',
        'value' => function($model){
            return $model->totalJawabanBenar;
        }
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'skor',
        'value' => function($model){
            return number_format((int)$model->totalJawabanBenar / (int)$model->getTaRegisterPengerjaanRincians()->count() * 100,2,'.',',');
        }
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'waktu_selesai',
        'format' => ['date', 'php:d M Y H:i:s'],
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'template' => '{cetak}',
        'buttons' => [
            'cetak' => function($url, $model){
                return Html::a('Cetak', $url, ['class' => 'btn btn-info', 'target' => '_blank', 'data-pjax' => 0]);
            }
        ]
    ],

];   