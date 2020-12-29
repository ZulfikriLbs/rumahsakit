<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TblRegistrasiPenunjangPasien */
?>
<div class="tbl-registrasi-penunjang-pasien-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nomor_registrasi_penunjang_pasien',
            'tgl_registrasi_penunjang_pasien',
            'nomor_registrasi_pasien',
            'id_dokter',
            'id_detail_instalasi',
            'no_urut',
            'diagnosa',
            'id',
            'tgl_catat',
            'sample_id',
        ],
    ]) ?>

</div>
