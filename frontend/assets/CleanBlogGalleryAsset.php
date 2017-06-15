<?php

namespace frontend\assets;

use yii\web\AssetBundle;
use yii\web\View;
/**
 * Description of GalleryAsset
 *
 * @author admin
 */
class CleanBlogGalleryAsset extends AssetBundle
{
    public $css = [
        'css/clean-blog/gallery/style.css',
    ];
    
    public $js = [
        'js/clean-blog/isotope/jquery.isotope.js',
    ];
    
    public $depends = [
        'yii\web\JqueryAsset',
    ];

    public $jsOptions = [
        'position' => View::POS_END,
    ];

}
