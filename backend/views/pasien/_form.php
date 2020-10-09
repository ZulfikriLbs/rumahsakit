<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model common\models\TblPasien */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-pasien-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'no_rekam_medik')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'nm_pasien')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'jns_kelamin')->dropDownList(['Laki-Laki' => 'Laki-Laki', 'Perempuan' => 'Perempuan'], 
                ['id'=>'jns-kelamin', 'prompt' => 'Silakan pilih jenis kelamin']) ?>

            <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'no_ktp')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">

            <?= $form->field($model, 'cara_bayar')->dropDownList(['BPJS' => 'BPJS', 'Umum' => 'Umum'], 
                ['id'=>'cara-bayar', 'prompt' => 'Silakan pilih cara bayar']) ?>

            <?= $form->field($model, 'no_bpjs')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'no_registrasi')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'tgl_registrasi')->widget(DateTimePicker::className(),[
                'type' => DateTimePicker::TYPE_INPUT,
                'pluginOptions' => [
                    'autoclose'=>true,
                    'format' => 'yyyy-mm-dd hh:ii:ss'
                ]
            ]) ?>
        </div>
    </div>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
