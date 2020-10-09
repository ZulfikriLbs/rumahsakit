<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAssetMateri;
use common\widgets\Alert;

AppAssetMateri::register($this);
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
    <link rel="icon" href="<?= Yii::getAlias('@web'). '/images/core-img/favicon.ico' ?>">
</head>
<body class="hold-transition layout-top-nav">
<?php $this->beginBody() ?>

<div class="wrapper">
    
   <!-- Navbar -->
   <nav class="main-header navbar navbar-expand-md navbar-purple ">
    <div class="container">
      <a href="<?= Url::to(['site/index']) ?>" class="navbar-brand">
        <img src="<?= Yii::getAlias('@web').'/images/core-img/owl-back.png' ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">TemanBelajarku.net</span>
      </a>
      
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="<?= Url::to(['site/index']) ?>" class="nav-link">Beranda</a>
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

        
      </div>

      
    </div>
  </nav>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Selamat belajar, <?= \Yii::$app->user->identity->username?> :)</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= Url::to(['site/index']) ?>">Beranda</a></li>
              <li class="breadcrumb-item"><a href="<?= Url::to(['site/index']) ?>">Materi</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                      src="../../dist/img/avatar1.png"
                      alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?= \Yii::$app->user->identity->username?></h3>

                <p class="text-muted text-center">Siswa TemanBelajarku.net</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b> </b> <a class="float-right"></a>
                  </li>
                  <li class="list-group-item"  style="text-align:center;">
                    <b> <a href="<?= Url::to(['/register-pengerjaan'])?>" class="btn btn-danger">Rekapitulasi Nilai Kamu </b></a>
                  </li>
                  <li class="list-group-item">
                    <b></b> <a class="float-right"></a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            
            <!-- /.card -->
          </div>
          <div class="col-md-9">
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
 
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

<!--<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
             <!--<div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                <p class="text-muted">
                  B.S. in Computer Science from the University of Tennessee at Knoxville
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted">Malibu, California</p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                <p class="text-muted">
                  <span class="tag tag-danger">UI Design</span>
                  <span class="tag tag-success">Coding</span>
                  <span class="tag tag-info">Javascript</span>
                  <span class="tag tag-warning">PHP</span>
                  <span class="tag tag-primary">Node.js</span>
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
              </div>
              <!-- /.card-body 
            </div>-->
