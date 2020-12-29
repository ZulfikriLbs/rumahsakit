<?php
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\DateTimePicker;
use kartik\widgets\Select2;
use kartik\builder\TabularForm;
use kartik\grid\GridView;
use yii\bootstrap\Modal;

$this->title = 'Tambah Data Penunjang Pasien';
$this->params['breadcrumbs'][] = $this->title;

/* @var $this yii\web\View */
/* @var $model common\models\TblRegistrasiPenunjangPasien */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-registrasi-penunjang-pasien-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="card card-primary">
        <div class="card-header">
            <div class="card-title">
                Rujukan Masuk
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                    <label class="label-control">Tanggal Rujukan / Inst. Asal</label>
                    <div class="row">
                        <div class="col-md-7">
                            <?= Html::textInput('id', '2020-12-20 11:00', ['class' => 'form-control']) ?>
                        </div>
                        <div class="col-md-1">
                            /
                        </div>
                        <div class="col-md-4">
                        <?= Html::dropDownList('id_instalasi', 2, [1 => 'Instalasi Radiologi', '2' => '01 - IRJ'], ['class' => 'form-control']) ?>
                        </div>
                    </div>
                </div>

                <?= $form->field($model, 'nomor_registrasi_pasien')->widget(Select2::className(), [
                    'data' => ['20102003400' => '20102003400 - Zulfikri'],
                    'options' => [
                        'id' => 'no-registrasi-pasien',
                        'placeholder' => 'Input Nomor Register Pasien',
                    ],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                    
                ])->label('Nomor Register Pasien') ?>

                <div class="form-group">
                    <label class="label-control">Tanggal Reg. Asal</label>
                    <?= DateTimePicker::widget([
                        'name' => 'tgl_registrasi_pasien',
                        'pluginOptions' => [
                            'autoclose'=>true,
                            'format' => 'yyyy-mm-dd hh:ii:ss'
                        ]
                    ]) ?>
                </div>

                
                <?= $form->field($model, 'id_dokter')->widget(Select2::className(), [
                    'data' => ['1' => 'Zulfikri, dr, Sp.K'],
                    'options' => [
                        'id' => 'no-rekam-medik',
                        'placeholder' => 'Input Nama Dokter',
                    ],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                    
                ])->label('Dokter') ?>
                

                <div class="form-group">
                    <label class="label-control">Nomor Telp.</label>
                        <?= Html::textInput('no_telp', '082365235200', ['class' => 'form-control']) ?>
                    </label>
                </div>

                <div class="form-group">
                    <label class="label-control">Nomor PPDS/No. Telp</label>
                        <?= Html::textInput('no_telp_ppds', '082365235200', ['class' => 'form-control']) ?>
                    </label>
                </div>
                
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="label-control">Ruang Rawat</label>
                            <?= Html::textInput('no_telp', '', ['class' => 'form-control']) ?>
                        </label>
                    </div>

                    <div class="form-group">
                        <label class="label-control">Kamar</label>
                            <?= Html::textInput('no_telp_ppds', '', ['class' => 'form-control']) ?>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="label-control">Cara Bayar</label>
                            <?= Html::textInput('cara_bayar', 'Mandiri', ['class' => 'form-control']) ?>
                        </label>
                    </div>

                    <div class="form-group">
                        <label class="label-control">Paket Jaminan</label>
                            <?= Html::textInput('paket_jaminan', 'MANDIRI', ['class' => 'form-control']) ?>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card card-info">
        <div class="card-header">
            <div class="card-title">
                Tindakan
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                    <label class="label-control">Instalasi</label>
                    <?= Html::dropDownList('id_instalasi', 1, [1 => 'Instalasi Radiologi'], ['class' => 'form-control']) ?>
                </div>

                <div class="form-group">
                    <label class="label-control">Sub Instalasi</label>
                    <?= Html::dropDownList('id_sub_instalasi', 1, [1 => 'Radiologi'], ['class' => 'form-control']) ?>
                </div>

                <?= $form->field($model, 'id_detail_instalasi')->dropDownList([1 => 'Radiologi'])->label('Detail Sub Instalasi') ?>

                <div class="form-group">
                    <label class="label-control">User ID/ Tanggal Server</label>
                    <div class="row">
                        <div class="col-md-3">
                            <?= Html::activeTextInput($model, 'id', ['class' => 'form-control']) ?>
                        </div>
                        <div class="col-md-1">
                            /
                        </div>
                        <div class="col-md-8">
                            <?= Html::activeTextInput($model, 'tgl_catat', ['class' => 'form-control', 'value' => date('Y-m-d H:i')]) ?>
                        </div>
                    </div>
                </div>
                
                </div>
                <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-8">
                            <?= $form->field($model, 'tgl_registrasi_penunjang_pasien')->widget(DateTimePicker::className(),[
                                'type' => DateTimePicker::TYPE_INPUT,
                                'pluginOptions' => [
                                    'autoclose'=>true,
                                    'format' => 'yyyy-mm-dd hh:ii:ss'
                                ]
                            ]) ?>
                        </div>
                        <div class="col-md-4">
                            <?= $form->field($model, 'no_urut')->textInput() ?>
                        </div>
                    </div>

                    <?= $form->field($model, 'nomor_registrasi_penunjang_pasien')->textInput(['maxlength' => true]) ?>
                

                    <?= $form->field($model, 'diagnosa')->textArea(['maxlength' => true]) ?>
                </div>
            </div>
        </div>
    </div>
    <?= $form->field($model, 'sample_id')->textInput(['maxlength' => true]) ?>

    <?= 
        TabularForm::widget([
            'dataProvider'=>$dataProvider,
            'form'=>$form,
            'attributes'=> $modelDokumen->formAttribs,
            'actionColumn' => false,
            'gridSettings'=>[
                'id'=>'crud-datatable',
                'condensed'=>true,
                'floatHeader'=>true,
                'pjax'=>true,
                'panel'=>[
                    'heading' => 'Tindakan Penunjang',
                    'before' => false,
                    'type' => GridView::TYPE_PRIMARY,
                    'after'=> Html::a('<i class="fas fa-plus"></i> Tambah', ['create', 'dokumen' => 'true', 'item' => $item], ['class'=>'btn btn-success']) . ' ' . 
                            Html::submitButton('<i class="fas fa-save"></i> Simpan', ['class'=>'btn btn-primary'])
                ]
            ]   
        ]);
    ?>

    <?php ActiveForm::end(); ?>
    
</div>

