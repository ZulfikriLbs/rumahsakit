<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\TaPembahasan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ta-pembahasan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_soal')->dropDownList(
            ArrayHelper::map($modelPembahasan, 'id_soal', function($model){
                return 'Sub Bab '.$model->id_sub_bab.'. '.$model->bab->judul.' No.'.$model->no_soal.': '.$model->soal;
            })
        ); ?>

    <?= $form->field($model, 'uploadFileBahas')->widget(FileInput::classname(),[
        'options' => ['multiple' => false],
        'pluginOptions' => [
            'initialPreview'=>[
                $model->isNewRecord ? null : ($model->hashbahas ? Url::to(['pembahasan/gambar-pembahasan', 'hashCode' => $model->hashbahas]) : null),
            ],
            'initialPreviewConfig' => [
                ['type' => 'image']
            ],
            'initialPreviewAsData'=>true,
            
        ]
        ])->label('Gambar Pembahasan'); ?>

    <?= $form->field($model, 'pembahasan')->textarea(['rows' => 6,'id' => 'math-input-pembahasan', 'class' => 'form-control math-input']) ?>

    <div id="preview-math-input-pembahasan" class="preview-math"></div>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
