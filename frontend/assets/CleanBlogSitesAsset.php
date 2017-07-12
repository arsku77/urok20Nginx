<?php

namespace frontend\assets;

use yii\web\AssetBundle;
use yii\web\View;
/**
 * Description of GalleryAsset
 *
 * @author admin
 */
class CleanBlogSitesAsset extends AssetBundle
{
    public $css = [
       // 'other/clean-blog/vendor/bootstrap/css/bootstrap.min.css',
        'css/clean-blog/clean-blog.min.css',
        'other/clean-blog/vendor/font-awesome/css/font-awesome.min.css',
        'css/clean-blog/fonts-lora.css',
        'css/clean-blog/fonts-open-sans.css',
    ];
    
    public $js = [
        'other/clean-blog/vendor/jquery/jquery.min.js',
        'other/clean-blog/vendor/bootstrap/js/bootstrap.min.js',
        'js/clean-blog/jqBootstrapValidation.js',
        'js/clean-blog/contact_me.js',
//        'js/clean-blog/clean-blog.min.js',
    ];
    
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

    public $jsOptions = [
        'position' => View::POS_END,
    ];

}
