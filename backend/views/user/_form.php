<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\widgets\SwitchInput;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model app\modules\administrator\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

	<?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'id_kelas')->dropDownList(ArrayHelper::map($kelas, 'id_kelas', 'nm_kelas'), 
        ['id'=>'id-kelas', 'prompt' => 'Silakan pilih kelas terlebih dahulu'])->label('Kelas') ?>

    <?php if ($model->isNewRecord) : ?>
    	<?= $form->field($modelProfil, 'nama')->textInput(['maxlength' => true]) ?>
    	<?= $form->field($modelProfil, 'uploadFile')->widget(FileInput::classname(),[
	        'options' => ['multiple' => false],
	    ])->label('Foto'); ?>
    <?php endif; ?>

	<?= $form->field($model, 'status')->widget(SwitchInput::classname(), [
		'pluginOptions' => [
			'onText' => 'Aktif',
			'offText' => 'Non-Aktif',
		]
	]) ?>

	<?php if (!$model->isNewRecord) { ?>
		<strong> Kosongkan jika tidak ingin mengubah password</strong>
		<div class="ui divider"></div>
		<?= $form->field($model, 'new_password')->label('Password Baru'); ?>
		<?= $form->field($model, 'repeat_password')->label('Ulangi Password Baru'); ?>
		<?= $form->field($model, 'old_password')->label('Password Lama'); ?>
	<?php } ?>
	<div class="form-group">
		<?= Html::submitButton($model->isNewRecord ? 'Tambah' : 'Ubah', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		
        <?= Html::a('Kembali', ['user/index'],['class' => "btn btn-success"]) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>
