<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\RefBab */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ref-bab-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_kelas')->dropDownList(ArrayHelper::map($kelas, 'id_kelas', 'nm_kelas'), 
        ['id'=>'id-kelas', 'prompt' => 'Silakan pilih kelas terlebih dahulu']) ?>

    <?= $form->field($model, 'kd_bab')->textInput() ?>

    <?= $form->field($model, 'judul')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'deskripsi')->textarea(['rows' => 6]) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
