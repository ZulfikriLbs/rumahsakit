<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\RefKelas */
?>
<div class="ref-kelas-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_kelas',
            'nm_kelas',
        ],
    ]) ?>

</div>
