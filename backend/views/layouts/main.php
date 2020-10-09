<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use backend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Url;
use common\components\CustomHelper;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="icon" href="<?= Yii::getAlias('@web').'/dist/images/core-img/favicon.ico' ?>">
</head>
<body class="hold-transition sidebar-mini">
<?php $this->beginBody() ?>

<div id="wrapper">
    
    <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?=Url::to(['/site']);?>" class="nav-link">Beranda</a>
      </li>
      <li>
      <?= Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Keluar',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()?>
      </li>
    </ul>
    
  </nav>
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="position: fixed;">
    <!-- Brand Logo -->
    <a href="<?=Url::to(['/site']);?>" class="brand-link">
      <img src="<?= Yii::getAlias('@web').'/dist/images/core-img/owl-back.png' ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">RumahSakit.tes</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= CustomHelper::getImageUser() ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= CustomHelper::getUserFullName() ?> Rumah Sakit</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
            <?php  
            $currLink = $this->context->id .'/'.$this->context->action->id;
            $menuItems = [
                ['label' => '<i class="'.($currLink == 'pasien/index' ? 'nav-icon fas fa-circle text-success' : 'nav-icon fas fa-sitemap').'"></i><p><span class="nav-label">Pasien</span></p>', 'url' => ['/pasien/index'], 'options'=>['class'=>'nav-item'], 'linkOptions'=>['class'=>'nav-link '.($currLink == 'pasien/index' ? 'active' : '')],],
                ['label' => '<i class="'.($currLink == 'obat/index' ? 'nav-icon fas fa-circle text-success' : 'nav-icon fas fa-book').'"></i><p><span class="nav-label">Obat</span></p>', 'url' => ['/obat/index'], 'options'=>['class'=>'nav-item'], 'linkOptions'=>['class'=>'nav-link '.($currLink == 'obat/index' ? 'active' : '')],],
                ['label' => '<i class="'.($currLink == 'transaksi/index' ? 'nav-icon fas fa-circle text-success' : 'nav-icon fas fa-book').'"></i><p><span class="nav-label">Transaksi</span></p>', 'url' => ['/transaksi/index'], 'options'=>['class'=>'nav-item'], 'linkOptions'=>['class'=>'nav-link '.($currLink == 'transaksi/index' ? 'active' : '')],],
                ['label' => '<i class="'.($currLink == 'satuan/index' ? 'nav-icon fas fa-circle text-success' : 'nav-icon fas fa-book').'"></i><p><span class="nav-label">Satuan</span></p>', 'url' => ['/satuan/index'], 'options'=>['class'=>'nav-item'], 'linkOptions'=>['class'=>'nav-link '.($currLink == 'satuan/index' ? 'active' : '')],],
                ['label' => '<i class="'.($currLink == 'cregister-pasien/index' ? 'nav-icon fas fa-circle text-success' : 'nav-icon fas fa-book').'"></i><p><span class="nav-label">Cetak Registrasi Pasien</span></p>', 'url' => ['/cregister-pasien/index'], 'options'=>['class'=>'nav-item'], 'linkOptions'=>['class'=>'nav-link '.($currLink == 'cregister-pasien/index' ? 'active' : '')],],
                ['label' => '<i class="'.($currLink == 'cregister-penjualan/index' ? 'nav-icon fas fa-circle text-success' : 'nav-icon fas fa-book').'"></i><p><span class="nav-label">Cetak Transaksi</span></p>', 'url' => ['/cregister-penjualan/index'], 'options'=>['class'=>'nav-item'], 'linkOptions'=>['class'=>'nav-link '.($currLink == 'cregister-penjualan/index' ? 'active' : '')],],
                
            ];
            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => '<p><span class="nav-label">Signup</span></p>', 'url' => ['/site/signup'], 'options'=>['class'=>'nav-item'], 'linkOptions'=>['class'=>'nav-link '],];
                $menuItems[] = ['label' => '<p><span class="nav-label">Login</span></p>', 'url' => ['/site/login'], 'options'=>['class'=>'nav-item'], 'linkOptions'=>['class'=>'nav-link '],];
            } else {
                
            }
            echo Nav::widget([
                'options' => [
                    'class' => 'nav nav-pills nav-sidebar flex-column', 
                    'id' => "side-menu",
                    'data-widget' => "treeview",
                    'role' => 'menu',
                    'data-accordion' => "false"
                ],
                'items' => $menuItems,
                'encodeLabels' => false,
            ]);
            ?>
        </nav>
      <!-- /.sidebar-menu -->
      </div>
    <!-- /.sidebar -->
  </aside>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">RumahSakit.tes</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-primary card-outline">
              <div class="card-body">
                <?= $content ?>
            </div>
           </div>
         </div>
       </div>
      </div>
    </div>
   </div>
   <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
    </div>
    <!-- Default to the left -->
    <strong>RumahSakit.tes <a href="https://adminlte.io"> AdminLTE.io </a>.</strong> All rights reserved.
  </footer>
</div>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
