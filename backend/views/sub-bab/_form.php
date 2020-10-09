<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\TaSubBab */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ta-sub-bab-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_bab')->dropDownList(ArrayHelper::map($modelBab, 'id_bab', 'judul'), 
        ['id'=>'id-bab', 'prompt' => 'Silakan pilih bab terlebih dahulu']) ?>

    <?= $form->field($model, 'kd_bab')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'judul')->textInput() ?>

    <?= $form->field($model, 'deskripsi')->textarea(['rows' => 6])  ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
