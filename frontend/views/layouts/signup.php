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
</head>
<?php $this->beginBody() ?>
<body  style="background:#3b5998">

    <div class="main"  style="background:#3b5998; padding-top:100px;">

        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title" style="color:#3b5998;">Daftar Murid Baru</h2>
                        <?= $content ?>
                    </div>
                    <div class="signup-image">
                        <figure><img src="<?= Yii::getAlias('@web'). '/images/signup-image.jpg' ?>" alt="sing up image"></figure>
                        <a href="login" class="signup-image-link" style="color:#3b5998;">Sudah pernah mendaftar?</a>
                    </div>
                </div>
            </div>
        </section>

    </div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>