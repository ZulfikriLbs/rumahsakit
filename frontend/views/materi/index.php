<?php
/* @var $this yii\web\View */
use common\components\CustomHelper;
use yii\helpers\Url;

$this->title="TemanBelajarku.net/Bab Materi";
?>
<div class="row">
    <div class="col-12">
        <h4>Daftar Bab</h4>
        <?php foreach ($modelBab as $model) : ?>
        <div class="post">
            <div class="user-block">
            <img class="img-circle img-bordered-sm" src="<?= CustomHelper::buatImagedariText($model->kd_bab);?>" alt="user image">
            <span class="username">
                <?=$model->judul ?>
            </span>
            <span class="description"><?=$model->kelas->nm_kelas ?></span>
            </div>
            <!-- /.user-block -->
            <p>
            <?= $model->deskripsi ? nl2br($model->deskripsi) : '<i>Belum ada deskripsi bab</i>' ?>
            </p>

            <p>
            <a href="<?= Url::to(['materi/sub-bab', 'idBab' => $model->id_bab])?>" class="btn btn-primary"><i class="fas fa-link mr-1"></i>Sub Bab</a>
            </p>
        </div>
        <?php endforeach; ?>

        
    </div>
</div>