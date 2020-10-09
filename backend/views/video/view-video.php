<?php 
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\TaVideo */
?>
<div id="ta-video-view-video">
<object type="video/mp4" data="<?= Url::to(['video/video', 'hashCode' => $model->hashcode]) ?>"  />
</div>