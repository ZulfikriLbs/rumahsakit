<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DateTimePicker;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\TblPasien */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-pasien-form">

    <?php $form = ActiveForm::begin(['options' => ['target' => '_blank']]); ?>
        <?= $form->field($model, 'nama')->widget(Select2::classname(), [
                
                'data' => $modelPasien,
                'options' => [
                    'placeholder' => 'Input Nama Pasien',
                ],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]
        )->label('Nama Pasien') ?>
        <?= $form->field($model, 'bulan')->dropDownList( [
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
        ], 
                ['id'=>'bulan', 'prompt' => 'Silakan pilih bulan']) ?>
        <?= Html::submitButton('Cetak' , ['class' => 'btn btn-primary']) ?>

    <?php ActiveForm::end(); ?>
</div>
