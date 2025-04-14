<?php
/**
 * @link https://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license https://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'tmpl/assets/css/fontawesome.css',
        'tmpl/assets/css/templatemo-space-dynamic.css',
        'tmpl/assets/css/animated.css',
        'tmpl/assets/css/owl.css',
        'css/site.css',
        'css/loader.css',

    ];
    public $js = [
        'tmpl/assets/js/owl-carousel.js',           // Owl carousel
        'tmpl/assets/js/animation.js',              // Анимации
        'tmpl/assets/js/imagesloaded.js',           // ImagesLoaded
        'tmpl/assets/js/templatemo-custom.js',      // Твой кастомный JS
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset'
    ];
}
