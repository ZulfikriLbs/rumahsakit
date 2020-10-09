<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TaSubBab */
?>
<div class="ta-sub-bab-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_sub_bab',
            'id_bab',
            'kd_bab',
            'judul',
            'deskripsi',
        ],
    ]) ?>

</div>
