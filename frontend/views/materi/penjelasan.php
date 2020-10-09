<?php 
use yii\helpers\Url;
use yii\helpers\Html;
use yii\web\View;
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

$this->title="TemanBelajarku.net/Materi Pembelajaran";
?>
<?php if ($modelVideoAll) : ?>
<div class="mt-4 text-right">
    <?= Html::a('<i class="fas fa-edit fa-lg mr-2"></i> Latihan', ['materi/latihan', 'idBab' => $modelBab->id_sub_bab],['class' => "btn btn-primary btn-lg btn-flat"]) ?>

    <?= Html::a('<i class="fas fa-arrow-left fa-lg mr-2"></i> Kembali', ['materi/sub-bab', 'idBab' => $modelBab->id_bab],['class' => "btn btn-success btn-lg btn-flat"]) ?>
</div>

<?php foreach ($modelVideoAll as $modelVideo) : ?>
<div class="row">  
    <div class="col-md-12">
        <div class="row">
            <div class="col-12 col-sm-12">
                <h3 class="my-3"><?= $modelBab->judul ?></h3>
                <p><?= $modelVideo ? $modelVideo->deskripsi : '<i>Belum ada deskripsi</i>' ?></p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12 col-sm-6">
                <h3 class="d-inline-block d-sm-none"><?= $modelBab->judul ?></h3>
                <div class="col-12">
                    <video height="250px"  controls preload="none">
                        <source src="<?= $modelVideo ? Url::to(['materi/video', 'hashCode' => $modelVideo->hashcode]) : ''?>" class="video-belajar" id="video-belajar-id"  type="video/mp4" >
                            <p> Tidak ada Video </p> 
                        </source>
                    </video>
                </div>
                
            </div>
            <div class="col-12 col-sm-6">
                <h5 class="my-3">Sub Bab</h4>
                <p><?= $modelBab->judul ?></p>

                <hr>
                <h5 class="my-3">Bab</h5>
                <p><?= $modelBab->bab->judul ?></p>
                
                <hr>
                <h5 class="my-3">Kelas</h5>
                <p><?= $modelBab->bab->kelas->nm_kelas ?></p>
                
                <hr>

                <div class="mt-4">
                    <?= $modelVideo ? Html::a('<i class="fas fa-download fa-lg mr-2"></i> Download', ['materi/download-video', 'hashCode' => $modelVideo->hashcode],['class' => "btn btn-default btn-lg btn-flat", 'target' => '_blank']) : '' ?>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<?php endforeach ;?>
<?php else: ?>
<div class="row">
    <div class="col-md-12">
        <p class="text-center">Mohon maaf, video belum tersedia</p>
    </div>
</div>
<?php endif; ?>

