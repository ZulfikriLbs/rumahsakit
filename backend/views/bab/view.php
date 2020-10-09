<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\RefBab */
?>
<div class="ref-bab-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_bab',
            'id_kelas',
            'kd_bab',
            'judul:ntext',
            'deskripsi:ntext',
        ],
    ]) ?>

</div>
