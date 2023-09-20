<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/test.css',
    ];
    public $js = [
        'web/js/notify.js',
        'web/js/main.js',
        'web/js/jquery.quicksearch.js',
        'web/lib/vue/2.5.16/vue.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}