<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TaPembahasan */
?>
<div class="ta-pembahasan-update">

    <?= $this->render('_form', [
        'model' => $model,
        'modelPembahasan' => $modelPembahasan
    ]) ?>

</div>
