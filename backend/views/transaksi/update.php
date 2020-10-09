<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblTransaksi */
?>
<div class="tbl-transaksi-update">

    <?= $this->render('_form', [
        'model' => $model,
        'modelRekamMedik' => $modelRekamMedik,
        'modelObat' => $modelObat
    ]) ?>

</div>
