<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\TblObat */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-obat-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nm_obat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'merk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nm_pabrikan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'satuan')->dropDownList(ArrayHelper::map($modelSatuan, 'nm_satuan', 'nm_satuan'), 
        ['id'=>'jns-satuan', 'prompt' => 'Silakan pilih satuan']) ?>

    <?= $form->field($model, 'harga')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
