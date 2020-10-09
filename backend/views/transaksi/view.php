<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TblTransaksi */
?>
<div class="tbl-transaksi-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_transaksi',
            'tgl_transaksi',
            'no_rekam_medik',
            'id_obat',
            'nm_pasien',
            'cara_bayar',
            'nm_obat',
            'jumlah',
            'harga',
            'total',
        ],
    ]) ?>

</div>
