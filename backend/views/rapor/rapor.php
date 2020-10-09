<?php
use common\components\CustomHelper;
?>

<h3><p class="text-center">Laporan Hasil Belajar Siswa</p></h3>
<table>
    <tr>
        <td>ID Register Soal</td><td>:</td><td><?=$modelRegister->id_register?></td>
    </tr>
    <tr>
        <td>Nama</td><td>:</td><td><?= CustomHelper::getUserFullName()?></td>
    </tr>
    <tr>
        <td>Kelas</td><td>:</td><td><?= CustomHelper::getKelas()?></td>
    </tr>
    <tr>
        <td>Bab</td><td>:</td><td><?=$modelSubBab->bab->judul?></td>
    </tr>
    <tr>
        <td>Sub Bab</td><td>:</td><td><?=$modelSubBab->judul?></td>
    </tr>
    <tr>
        <td>Waktu Mulai</td><td>:</td><td><?= date('d M Y H:i:s', $modelRegister->waktu_dimulai) ?></td>
    </tr>
    <tr>
        <td>Waktu Selesai</td><td>:</td><td><?= date('d M Y H:i:s', $modelRegister->waktu_selesai) ?></td>
    </tr>
    <tr>
        <td><b>SKOR</b></td><td>:</td><td><b><?= number_format((int)$modelRegister->totalJawabanBenar / (int)$modelRegister->getTaRegisterPengerjaanRincians()->count() * 100,2,'.',',')?></b></td>
    </tr>
</table>
&nbsp; &nbsp;
<table class="table table-bordered" style="text-align:center;">
    <tr>
        <th style="text-align:center;">No</th><th style="text-align:center;">Kunci Jawaban</th><th style="text-align:center;">Jawaban Kamu</th>
    </tr>
    <?php 
    
    foreach ($modelRegister->taRegisterPengerjaanRincians as $model) : ?>
    <tr>
        <td><?= $model->soal->no_soal?></td><td><?= $model->soal->kunci?></td><td><?= $model->jawaban?></td>
    </tr>
    <?php endforeach;?>
</table>
<script src="<?= \Yii::getAlias('@web').'/js/mathreport.js'?>"></script>
<script src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js" async></script>