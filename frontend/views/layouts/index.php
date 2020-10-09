<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAssetLanding;
use common\widgets\Alert;
use yii\helpers\Url;

AppAssetLanding::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="icon" href="<?= Yii::getAlias('@web'). '/images/core-img/favicon.ico' ?>">
</head>

<?php $this->beginBody() ?>
<body>
    <!-- Preloader Start -->
    <div id="preloader">
        <div class="colorlib-load"></div>
    </div>

    <!-- ***** Header Area Start ***** -->
    <header class="header_area animated">
        <div class="container-fluid">
            <div class="row align-items-center">
                <!-- Menu Area Start -->
                <div class="col-12 col-lg-10">
                    <div class="menu_area">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <a class="navbar-brand" href="#">TemanBelajarku</a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ca-navbar" aria-controls="ca-navbar" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                            <!-- Menu Area -->
                            <div class="collapse navbar-collapse baru" id="ca-navbar">
                                <ul class="navbar-nav ml-auto" id="nav">
                                    <li class="nav-item active"><a class="nav-link" href="#home">Beranda</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#about">Tentang</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#contact">Kontak</a></li>
                                </ul>
                                <div class="sing-up-button d-lg-none">
                                    <a href="<?=Url::to(['site/signup']);?>">Daftar Murid Baru</a>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
                <!-- Signup btn -->
                <div class="col-12 col-lg-2">
                    <div class="sing-up-button d-none d-lg-block">
                        <a href="<?=Url::to(['site/signup']);?>">Daftar Murid Baru</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Wellcome Area Start ***** -->
    <section class="wellcome_area clearfix" id="home">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 col-md">
                    <div class="wellcome-heading">
                        <h2>Teman Belajarku</h2>
                        <h3><img src="<?= Yii::getAlias('@web'). '/images/core-img/owl-back.png' ?>" alt="" width="60%" height="100%"></h3>
                        <p>TemanBelajarku akan menemani kamu belajar dengan asyik dan seru. Yuk mulai kelasmu!</p>
                    </div>
                    <div class="get-start-area">
                        <a href="<?=Url::to(['site/login']);?>"><input type="submit" class="submit" value="Mulai Kelas"></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Welcome thumb -->
        <div class="welcome-thumb wow fadeInDown" data-wow-delay="0.5s" style="bottom:90px;">
            <img src="<?= Yii::getAlias('@web'). '/images/bg-img/welcome-img.png' ?>" alt="">
        </div>
    </section>
    <!-- ***** Wellcome Area End ***** -->

    <!-- ***** Special Area Start ***** -->
    <section class="special-area bg-white section_padding_100" id="about">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading Area -->
                    <div class="section-heading text-center">
                        <h2>Mengapa belajar bareng TemanBelajarku?</h2>
                        <div class="line-shape"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Single Special Area -->
                <div class="col-12 col-md-4">
                    <div class="single-special text-center wow fadeInUp" data-wow-delay="0.2s">
                        <div class="single-icon">
                            <i class="ti-blackboard" aria-hidden="true"></i>
                        </div>
                        <h4>Mudah Dipahami</h4>
                        <p>TemanBelajarku akan membantu kamu memahami materi-materi pelajaran dengan cara yang mudah dan simpel melalui video interaktif</p>
                    </div>
                </div>
                <!-- Single Special Area -->
                <div class="col-12 col-md-4">
                    <div class="single-special text-center wow fadeInUp" data-wow-delay="0.4s">
                        <div class="single-icon">
                            <i class="ti-mobile" aria-hidden="true"></i>
                        </div>
                        <h4>Mudah Diakses</h4>
                        <p>Kamu bisa belajar materi baru atau mengulangi materi pelajaran dimana saja bersama TemanBelajarku</p>
                    </div>
                </div>
                <!-- Single Special Area -->
                <div class="col-12 col-md-4">
                    <div class="single-special text-center wow fadeInUp" data-wow-delay="0.6s">
                        <div class="single-icon">
                            <i class="ti-write" aria-hidden="true"></i>
                        </div>
                        <h4>Latihan yang Menyenangkan</h4>
                        <p>Kamu tidak hanya diberi materi melalui video, ada soal-soal latihan beserta pembahasannya juga supaya kamu semakin jago</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
        
    <!-- ***** Special Area End ***** -->

    <!-- ***** Video Area Start ***** -->
    <div class="video-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Video Area Start -->
                    <div class="video-area" style="background-image: url(<?= Yii::getAlias('@web'). '/images/bg-img/owl-back-black.png'?>);">
                        <div class="video-play-btn">
                            <a href="https://www.youtube.com/watch?v=f5BBJ4ySgpo" class="video_btn"><i class="fa fa-play" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Video Area End ***** -->

    <!-- ***** Cool Facts Area Start ***** -->
    <section class="cool_facts_area clearfix">
        <div class="container">
        </div>
    </section>
    <!-- ***** Cool Facts Area End ***** -->

    <!-- ***** Our Team Area Start ***** -->
    <section class="our-Team-area bg-white section_padding_50_50 clearfix" id="team">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <!-- Heading Text  -->
                    <div class="section-heading">
                        <h2>Tim TemanBelajarku</h2>
                        <div class="line-shape"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4 col-md-offset-4">
                        </div>
                        <div class="text-center col-md-4 col-md-offset-4 col-lg-4 ">
                            <div class="single-team-member">
                                <div class="member-image">
                                    <img src="<?= Yii::getAlias('@web'). '/images/team-img/elsa2.jpg' ?>" alt="">
                                    <div class="team-hover-effects">
                                        <div class="team-social-icon">
                                            <a href="https://www.facebook.com/elsa.apriska" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                            <a href="https://www.instagram.com/elsaapriska/?hl=id" target="_blank"> <i class="fa fa-instagram" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="member-text">
                                    <h4>Elsa Apriska</h4>
                                    <p>CEO</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Our Team Area End ***** -->

    <!-- ***** Contact Us Area Start ***** -->
    <section class="footer-contact-area section_padding_70 clearfix" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Heading Text  -->
                    <div class="section-heading">
                        <h2 style="color:white;">Hubungi TemanBelajarku</h2>
                        <div class="line-shape"></div>
                    </div>
                    <div class="footer-text">
                        <h3 style="color:#5b32b4;">Kamu butuh bantuan?</h3>
                    </div>
                    <div class="address-text">
                        <!--<p><span>Address:</span> 40 Baria Sreet 133/2 NewYork City, US</p>-->
                    </div>
                    <div class="phone-text">
                        <p><span>Telp. :</span> <b style="color:white;"> +62 812-6610-4535</b></p>
                    </div>
                    <div class="email-text">
                        <p><span>Email :</span> <b style="color:white;">info.deercreative@gmail.com</b></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Contact Us Area End ***** -->

    <!-- ***** Footer Area Start ***** -->
    <footer class="footer-social-icon text-center section_padding_100 clearfix">
        <!-- footer logo -->
        <div class="footer-text">
            <h2>TemanBelajarku</h2>
        </div>
        <!-- social icon-->
        <div class="footer-social-icon">
            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a href="#"><i class="active fa fa-twitter" aria-hidden="true"></i></a>
            <a href="#"> <i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
        </div>
        <!-- Foooter Text-->
        <div class="copyright-text">
            <!-- ***** Removing this text is now allowed! This template is licensed under CC BY 3.0 *****-->
            <p>Designed Ca <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
        </div>
    </footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>