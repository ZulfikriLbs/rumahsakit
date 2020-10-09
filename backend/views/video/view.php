<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TaVideo */
?>
<div class="ta-video-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_video',
            'id_bab',
            'judul',
            'deskripsi',
            'hashcode',
            'link',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
