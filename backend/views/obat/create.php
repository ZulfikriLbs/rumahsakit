<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TblObat */

?>
<div class="tbl-obat-create">
    <?= $this->render('_form', [
        'model' => $model,
        'modelSatuan' => $modelSatuan
    ]) ?>
</div>
