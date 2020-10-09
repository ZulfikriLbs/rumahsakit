<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TblObat */
?>
<div class="tbl-obat-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_obat',
            'nm_obat',
            'merk',
            'nm_pabrikan',
            'satuan',
            'harga',
        ],
    ]) ?>

</div>
