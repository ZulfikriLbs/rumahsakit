<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAssetLanding extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/landing/style.css',
        'css/landing/css/responsive.css'
    ];
    public $js = [
        'js/landing/popper.min.js',
        'js/my.js',
        'js/landing/bootstrap.min.js',
        'js/landing/plugins.js',
        'js/landing/slick.min.js',
        'js/landing/footer-reveal.min.js',
        'js/landing/active.js'

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
