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
        'attribute'=>'no_rekam_medik',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'nm_pasien',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'jns_kelamin',
    ],
    // [
    //     'class'=>'\kartik\grid\DataColumn',
    //     'attribute'=>'alamat',
    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'no_ktp',
    ],
    // [
    //     'class'=>'\kartik\grid\DataColumn',
    //     'attribute'=>'cara_bayar',
    // ],
    // [
    //     'class'=>'\kartik\grid\DataColumn',
    //     'attribute'=>'no_bpjs',
    // ],
    // [
    //     'class'=>'\kartik\grid\DataColumn',
    //     'attribute'=>'no_registrasi',
    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'tgl_registrasi',
        'filter' => Html::dropDownList('TblPasienSearch[tgl_registrasi]', null,
            [
                '1' => 'Januari',
                '2' => 'Februari',
                '3' => 'Maret',
                '4' => 'April',
                '5' => 'Mei',
                '6' => 'Juni',
                '7' => 'Juli',
                '8' => 'Agustus',
                '9' => 'September',
                '10' => 'Oktober',
                '11' => 'November',
                '12' => 'Desember',
            ],['prompt' => 'Silakan Pilih Bulan']
        )
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
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
                          'data-confirm-message'=>'Are you sure want to delete this item'], 
    ],

];   