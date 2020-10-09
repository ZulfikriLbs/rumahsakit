<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TaSoal */
?>
<div class="ta-soal-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_soal',
            'id_sub_bab',
            'soal',
            'pil_a',
            'pil_b',
            'pil_c',
            'pil_d',
            'kunci',
        ],
    ]) ?>

</div>
