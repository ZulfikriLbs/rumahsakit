<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAssetLogin;
use common\widgets\Alert;

AppAssetLogin::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="icon" href="<?= Yii::getAlias('@web'). '/images/core-img/favicon.ico' ?>">
</head>
<?php $this->beginBody() ?>
<body style="background:#5b32b4;">

    <div class="main" style="background:#5b32b4; padding-top:100px;">

        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="<?= Yii::getAlias('@web'). '/images/signin-image.jpg' ?>" alt="sing up image"></figure>
                        <a href="signup" class="signup-image-link" style="color:#5b32b4;">Daftar Murid Baru?</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title" style="color:#5b32b4;">Masuk Kelas</h2>
                        <?= $content ?>
                    </div>
                </div>
            </div>
        </section>

    </div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>