<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\TaVideo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ta-video-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>


    <?= $form->field($model, 'id_sub_bab')->dropDownList(ArrayHelper::map($modelBab, 'id_sub_bab', function($model){
        return 'Bab '.$model->kd_bab.' '.$model->judul;
    }), ['id'=>'id-sub-bab', 'prompt' => 'Silakan pilih bab terlebih dahulu']) ?>

    <?= $form->field($model, 'judul')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'deskripsi')->textarea(['id' => 'math-input-deskripsi', 'class' => 'form-control math-input']) ?>

    <div id="preview-math-input-deskripsi" class="preview-math"></div>

    <?php /* $form->field($model, 'hashcode')->textInput(['maxlength' => true])*/ ?>

    <?= $form->field($model, 'uploadFile')->widget(FileInput::classname(),[
        'options' => ['multiple' => false],
        'pluginOptions' => [
            'initialPreview'=>[
                $model->isNewRecord ? null : Url::to(['video/video', 'hashCode' => $model->hashcode]),
            ],
            'initialPreviewConfig' => [
                ['type' => 'video', "filetype" => 'video/mp4']
            ],
            'initialPreviewAsData'=>true,
            
        ]
    ])->label('Video'); ?>

    <?php /* $form->field($model, 'created_at')->textInput()*/ ?>

    <?php /* $form->field($model, 'updated_at')->textInput()*/ ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
