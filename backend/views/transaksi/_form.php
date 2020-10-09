<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\widgets\DateTimePicker;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\TblTransaksi */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="tbl-transaksi-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'tgl_transaksi')->widget(DateTimePicker::className(),[
                'type' => DateTimePicker::TYPE_INPUT,
                'pluginOptions' => [
                    'autoclose'=>true,
                    'format' => 'yyyy-mm-dd hh:ii:ss'
                ]
            ]) ?>

            <?= $form->field($model, 'no_rekam_medik')->widget(Select2::classname(), [
                
                'data' => $modelRekamMedik,
                'options' => [
                    'id' => 'no-rekam-medik',
                    'placeholder' => 'Input Nomor Rekam Medik',
                    'data-url' => Url::to(['transaksi/rekam-medik'])
                ],
                'pluginOptions' => [
                    'allowClear' => true
                ],
                'pluginEvents' => [
                    "select2:select" => "function(datax) { 
                        $.ajax({
                        url: '".Url::to(['transaksi/rekam-medik'])."',
                        data: {nomor: datax.params.data.text},
                        dataType: 'json',
                        success: function(data){
                            $('#nm-pasien').val(data.nm_pasien);
                            $('#cara-bayar').val(data.cara_bayar);
                        }
                    }) ;

                    return datax.params.data.text;
                }",
                ]
            ]); ?>

            <?= $form->field($model, 'id_obat')->hiddenInput(['id' => 'id-obat'])->label(false) ?>

            <?= $form->field($model, 'nm_pasien')->textInput(['maxlength' => true, 'readonly' => true, 'id'=>'nm-pasien']) ?>

            <?= $form->field($model, 'cara_bayar')->textInput(['maxlength' => true, 'readonly' => true, 'id'=>'cara-bayar']) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'nm_obat')->widget(Select2::classname(), [
                
                'data' => $modelObat,
                'options' => [
                    'placeholder' => 'Input Nama Obat',
                    'data-url' => Url::to(['transaksi/rekam-medik'])
                ],
                'pluginOptions' => [
                    'allowClear' => true
                ],
                'pluginEvents' => [
                    "select2:select" => "function(datax) { 
                        $.ajax({
                        url: '".Url::to(['transaksi/data-obat'])."',
                        data: {obat: datax.params.data.text},
                        dataType: 'json',
                        success: function(data){
                            $('#id-obat').val(data.id_obat);
                            $('#harga').val(data.harga);
                        }
                    }) ;
                    return datax.params.data.text;
                }",
                ]
            ]); ?>

            <?= $form->field($model, 'jumlah')->textInput(['id' => 'jumlah']) ?>

            <?= $form->field($model, 'harga')->textInput(['readonly' => true,'id' => 'harga','style' => 'text-align: right;']) ?>

            <?= $form->field($model, 'total')->textInput(['readonly' => true,'id' => 'total','style' => 'text-align: right;']) ?>
        </div>
    </div>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
