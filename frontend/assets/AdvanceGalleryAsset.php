<?php

namespace frontend\assets;

use yii\web\AssetBundle;
use yii\web\View;
/**
 * Description of GalleryAsset
 *
 * @author admin
 */
class AdvanceGalleryAsset extends AssetBundle
{
    public $css = [
        'css/advance/gallery/style.css',
    ];
    
    public $js = [
        'js/advance/isotope/jquery.isotope.js',
    ];
    
    public $depends = [
        'yii\web\JqueryAsset',
    ];

    public $jsOptions = [
        'position' => View::POS_END,
    ];

}
