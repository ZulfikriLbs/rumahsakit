<?php
/* @var $this yii\web\View */
use common\components\CustomHelper;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

$this->registerJsFile(
    '@web/js/math.js',
    [
        'position' => View::POS_END,
        'depends' => [\yii\web\JqueryAsset::className()],
    ]
);
$this->registerJsFile(
    'https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js',
    [
        'id' => 'MathJax-script',
        'async' => 'async',
        'position' => View::POS_END,
        'depends' => [\yii\web\JqueryAsset::className()],
    ]
);

$this->title="TemanBelajarku.net/Latihan";
?>
<?php if ($flag) : ?>
<div class="row">
    <div class="col-12 col-sm-4">
        <div class="info-box bg-light">
        <div class="info-box-content">
            <span class="info-box-text text-center text-muted">Total Soal</span>
            <span class="info-box-number text-center text-muted mb-0"><?= count((array)$modelSoal) ?></span>
        </div>
        </div>
    </div>
    <div class="col-12 col-sm-4">
        <div class="info-box bg-green">
        <div class="info-box-content">
            <span class="info-box-text text-center ">Total Terjawab Benar</span>
            <span class="info-box-number text-center  mb-0"><?= $benar?></span>
        </div>
        </div>
    </div>
    <div class="col-12 col-sm-4">
        <div class="info-box <?= $persen < 50 ? 'bg-red' : ($persen < 70 ? 'bg-yellow' : 'bg-green') ?>">
        <div class="info-box-content">
            <span class="info-box-text text-center ">Persentase</span>
            <span class="info-box-number text-center mb-0"><?= number_format($persen,2,',','.').'%' ?><span>
        </div>
        </div>
    </div>
</div>
<?php endif;?>
<div class="row">
    <div class="col-12">
        <div>
        <h4>Daftar Soal</h4>
        </div>
        <?php if (!$flag) : ?>
            <div class="row">
                <div class="col-12 col-sm-12">
                    <div class="info-box petunjuk">
                    <div class="info-box-content">
                        <span class="info-box-text  ">Petunjuk mengerjakan soal</span>
                        <ol>
                            <li>Periksa dan bacalah soal-soal dengan saksama sebelum Anda menjawabnya.</li>
                            <li>Dahulukan menjawab soal-soal yang Anda anggap mudah.</li>
                            <li>Jumlah soal sebanyak <?= count((array)$modelSoal) ?> butir pilihan ganda.</li>
                            <li>Klik lingkaran di samping jawaban setiap soal yang menurut anda benar.</li>
                            <li>Tidak ada soal yang dikosongkan jawabannya.</li>
                            <li>Jika sudah siap dan yakin dengan jawabannya, klik tombol selesai.</li>
                            <li>Jangan lupa berdoa sebelum mengerjakan soal ^_^.</li>
                        </ol>
                    </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="form">
        <?php $form = ActiveForm::begin(); ?>
        <?php foreach ($modelSoal as $model) : 
            $jawaban = $modelJawaban->{'jawaban_p_'.$model->id_soal.'_sb_'.$model->id_sub_bab};
            $class['a'] = $class['b'] = $class['c'] = $class['d'] = '';
            if ($jawaban !== null){
                $class[$jawaban] = 'salah';
                $class[$model->kunci] = 'benar';
            } 
        ?>
        <div class="post">
            <div class="user-block">
            <img class="img-circle img-bordered-sm" src="<?= CustomHelper::buatImagedariText($model->no_soal);?>" alt="user image">
            
            <div class="soal">
                <?= $model->soal ?>
            </div>
            
            
            </div>
            <?php if ($model->hashsoal) :?>
                <div class="img-soal"><?= Html::img(Url::to(['materi/gambar', 'hashCode' => $model->hashsoal]))?></div>
            <?php endif;?>
            <div class="jawaban">
            <?= $form->field($modelJawaban, 'jawaban_p_'.$model->id_soal.'_sb_'.$model->id_sub_bab)->radioList([
                'a' => '<label class="form-check-label '.$class['a'].'">'.$model->pil_a.'</label>',
                'b' => '<label class="form-check-label '.$class['b'].'">'.$model->pil_b.'</label>',
                'c' => '<label class="form-check-label '.$class['c'].'">'.$model->pil_c.'</label>',
                'd' => '<label class="form-check-label '.$class['d'].'">'.$model->pil_d.'</label>',
            ],[
                
                'item' => function($index, $label, $name, $checked, $value) {
                    $return = '';
                    if ($index == 0 || $index == 2)
                        $return .= '<div class="col-md-6"><div class="form-group">';
                    $return .= '<div class="form-check">';
                    $return .= '<input class="form-check-input" type="radio" name="'.$name.'" value="' . $value . '" '.($checked ? 'checked' : '').'>';
                    $return .= $label;
                    $return .= '</div>';
                    if ($index == 1 || $index == 3)
                        $return .= '</div></div>';
                    return $return;
                },'class' => 'row',
                
            ])->label(false)?>
            </div>
            <?php if ($modelJawaban->{'jawaban_p_'.$model->id_soal.'_sb_'.$model->id_sub_bab}) : ?>
            <div class="pembahasan">
                <h6> Pembahasan Soal </h6>
                <?php if ($model->pembahasan) :?>
                    <?php if ($model->pembahasan->hashbahas) :?>
                        <div class="img-soal"><?= Html::img(Url::to(['materi/gambar-pembahasan', 'hashCode' => $model->pembahasan->hashbahas]))?></div>
                    <?php endif;?>
                <?php endif;?>
                <p><?= $model->pembahasan ? nl2br($model->pembahasan->pembahasan) : 'Belum ada pembahasan.'?></p>
            </div>
            <?php endif;?>
        </div>
        <?php endforeach; ?>
        <?php if (!$flag) : ?>
        <?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Selesai', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
        <?php } ?>
        <?php endif; ?>
        <?php ActiveForm::end(); ?>
        </div>
        <?php if ($flag) : ?>
	  	<div class="form-group">
            <?= Html::a('Kembali Belajar', ['materi/penjelasan', 'idBab' => $model->id_sub_bab],['class' => 'btn btn-primary']) ?>
	        <?= Html::a('Kembali ke menu sub bab', ['materi/sub-bab', 'idBab' => $kodeBab],['class' => 'btn btn-success']) ?>
	    </div>
        <?php endif; ?>
    </div>
</div>