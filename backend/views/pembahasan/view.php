<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TaPembahasan */
?>
<div class="ta-pembahasan-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_pembahasan',
            'id_soal',
            'judul_video:ntext',
            'pembahasan:ntext',
        ],
    ]) ?>

</div>
