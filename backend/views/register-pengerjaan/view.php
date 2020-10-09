<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TaRegisterPengerjaan */
?>
<div class="ta-register-pengerjaan-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_register',
            'id_user',
            'waktu_dimulai',
            'waktu_selesai',
        ],
    ]) ?>

</div>
