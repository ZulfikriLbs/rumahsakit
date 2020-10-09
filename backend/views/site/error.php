<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\HttpException;
$code = 0;
if ($exception instanceof HttpException) {
    $code = $exception->statusCode;
}
else 
    $code = $exception->getCode();
$this->title = $name;

$code = !$code ? 500 : $code;
$class = 'danger';
if ($code === 404)
    $class = 'warning';
?>
<section class="content">
    <div class="error-page">
    <h2 class="headline text-<?= $class ?>"><?= $code ?></h2>

    <div class="error-content">
        <h3><i class="fas fa-exclamation-triangle text-<?= $class ?>"></i> <?= $name ?></h3>

        <p>
        Kesalahan di atas terjadi saat server web sedang memproses permintaan Anda. Silahkan hubungi kami jika Anda merasa ini adalah kesalahan server. Terima kasih.
        Sementara itu, Anda mungkin <a href="<?= Url::to(['site/index']);?>">kembali ke dashboard</a> .
        </p>

        
    </div>
    <!-- /.error-content -->
    </div>
    <!-- /.error-page -->
</section>
