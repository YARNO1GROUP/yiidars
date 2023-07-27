<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',


       "https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap",
        "front/vendor/bootstrap-icons/font/bootstrap-icons.css",
        "front/vendor/hs-mega-menu/dist/hs-mega-menu.min.css",
        "front/css/theme.min.css"

    ];
    public $js = [


"front/vendor/bootstrap/dist/js/bootstrap.bundle.min.js",
"front/vendor/hs-header/dist/hs-header.min.js",
"front/vendor/hs-mega-menu/dist/hs-mega-menu.min.js",
"front/vendor/hs-show-animation/dist/hs-show-animation.min.js",
"front/vendor/hs-go-to/dist/hs-go-to.min.js",
"front/js/theme.min.js",

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
