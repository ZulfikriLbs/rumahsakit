<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TaSoal */
/* @var $form yii\widgets\ActiveForm */
use kartik\widgets\FileInput;
?>

<div class="ta-soal-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_sub_bab')->dropDownList(ArrayHelper::map($modelBab, 'id_sub_bab', function($model){
        return 'Bab '.$model->kd_bab.' '.$model->judul;
    }), ['id'=>'id-bab', 'prompt' => 'Silakan pilih bab terlebih dahulu']) ?>

    <?= $form->field($model, 'kompetensi_dasar')->textInput() ?>

    <?= $form->field($model, 'indikator')->textInput()->label('Indikator Pencapaian Kompetensi') ?>

    <?= $form->field($model, 'no_soal')->textInput() ?>

    <?= $form->field($model, 'uploadFileSoal')->widget(FileInput::classname(),[
        'options' => ['multiple' => false],
        'pluginOptions' => [
            'initialPreview'=>[
                //$model->isNewRecord ? null : Url::to(['video/video', 'hashCode' => $model->hashcode]),
            ],
            'initialPreviewConfig' => [
                ['type' => 'iamge']
            ],
            'initialPreviewAsData'=>true,
            
        ]
    ])->label('Gambar Soal'); ?>

    <?= $form->field($model, 'soal')->textarea(['id' => 'math-input-soal', 'rows' => 6, 'class' => 'form-control math-input']) ?>

    <div id="preview-math-input-soal" class="preview-math"></div>

    <?= $form->field($model, 'pil_a')->textInput(['id' => 'math-input-jawab-a', 'class' => 'form-control math-input']) ?>

    <div id="preview-math-input-jawab-a" class="preview-math"></div>

    <?= $form->field($model, 'pil_b')->textInput(['id' => 'math-input-jawab-b', 'class' => 'form-control math-input']) ?>

    <div id="preview-math-input-jawab-b" class="preview-math"></div>

    <?= $form->field($model, 'pil_c')->textInput(['id' => 'math-input-jawab-c', 'class' => 'form-control math-input']) ?>

    <div id="preview-math-input-jawab-c" class="preview-math"></div>

    <?= $form->field($model, 'pil_d')->textInput(['id' => 'math-input-jawab-d', 'class' => 'form-control math-input']) ?>

    <div id="preview-math-input-jawab-d" class="preview-math"></div>

    <?= $form->field($model, 'kunci')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
