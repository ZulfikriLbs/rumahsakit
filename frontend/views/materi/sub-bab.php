<?php
/* @var $this yii\web\View */
use common\components\CustomHelper;
use yii\helpers\Url;


$this->title="TemanBelajarku.net/Sub-Bab Materi";
?>

<div class="row">
    <div class="col-12">
        <div>
        <h4>Daftar Sub Bab</h4>
        </div>
        <?php foreach ($modelBab as $model) : ?>
        <div class="post">
            <div class="user-block">
            <img class="img-circle img-bordered-sm" src="<?= CustomHelper::buatImagedariText($model->kd_bab);?>" alt="user image">
            <span class="username">
                <a href="#"><?= $model->judul ?></a>
            </span>
            <span class="description"><?=$model->bab->kelas->nm_kelas.'-'.$model->bab->judul ?></span>
            </div>
            <!-- /.user-block -->
            <p>
            <?= $model->deskripsi ? nl2br($model->deskripsi) : '<i>Belum ada deskripsi sub bab</i>' ?>
            </p>

            <p>
            <a href="<?= Url::to(['materi/penjelasan', 'idBab' => $model->id_sub_bab])?>" class="btn btn-primary"><i class="fas fa-link mr-1"></i>Pelajari</a>
            <a href="<?= Url::to(['materi/latihan', 'idBab' => $model->id_sub_bab])?>" class="btn btn-success"><i class="fas fa-edit mr-1"></i>Latihan</a>
            </p>
        </div>
        <?php endforeach; ?>

        
    </div>
</div>