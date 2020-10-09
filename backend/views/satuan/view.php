<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TblSatuan */
?>
<div class="tbl-satuan-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_satuan',
            'nm_satuan',
        ],
    ]) ?>

</div>
