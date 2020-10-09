<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TblPasien */
?>
<div class="tbl-pasien-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'no_rekam_medik',
            'nm_pasien',
            'jns_kelamin',
            'alamat',
            'no_ktp',
            'cara_bayar',
            'no_bpjs',
            'no_registrasi',
            'tgl_registrasi',
        ],
    ]) ?>

</div>
