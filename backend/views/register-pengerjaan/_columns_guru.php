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
        'label' => 'ID Register',
        'value' => function($model){
            return $model->register->id_register;
        },
        'group' => true,  // enable grouping
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'id_bab',
        'label' => 'Bab',
        'format' => 'raw',
        'value' => function($model){
            return $model->register->subBab->bab->judul;
        },
        'group' => true, 
        'subGroupOf' => 2
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'id_sub_bab',
        'label' => 'Sub Bab',
        'format' => 'raw',
        'value' => function($model){
            return $model->register->subBab->judul;
        },
        'group' => true, 
        'subGroupOf' => 2
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'jumlah',
        'value' => function($model){
            return $model->register->getTaRegisterPengerjaanRincians()->count();
        },
        'group' => true, 
        'subGroupOf' => 2
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'poin',
        'value' => function($model){
            return $model->register->totalJawabanBenar;
        },
        'group' => true, 
        'subGroupOf' => 2
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'skor',
        'value' => function($model){
            return number_format((int)$model->register->totalJawabanBenar / (int)$model->register->getTaRegisterPengerjaanRincians()->count() * 100,2,'.',',');
        },
        'group' => true, 
        'subGroupOf' => 2
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'id_soal',
        'label' => 'Kesalahan'
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'label' => 'Indikator Pencapaian Kompetensi',
        'value' => function ($model) {
            return $model->soal->indikator;
        }
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'label' => 'Aksi',
        'format' => 'raw',
        'value' => function ($model) {
            return Html::a('Cetak', Url::to(['cetak','id'=>$model->id_register]), ['class' => 'btn btn-info', 'target' => '_blank', 'data-pjax' => 0]);
        },
        'group' => true, 
        'subGroupOf' => 2
    ],
   

];   