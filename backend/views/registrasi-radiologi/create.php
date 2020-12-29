<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TblRegistrasiPenunjangPasien */

?>
<div class="tbl-registrasi-penunjang-pasien-create">
    <?= $this->render('_form', [
        'model' => $model,
        'dataProvider' => $dataProvider,
        'modelDokumen' => $modelDokumen,
        'item' => $item
    ]) ?>
</div>