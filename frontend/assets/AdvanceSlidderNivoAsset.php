<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Description of GalleryAsset
 *
 * @author admin
 */
class AdvanceSlidderNivoAsset extends AssetBundle
{
    public $css = [
        'css/advance/slidders/nivo/nivo_slider.css',
        'css/advance/slidders/nivo/themes_default_default.css',
    ];
    
    public $js = [
        'js/advance/slidders/nivo/jquery.min.js',
        'js/advance/slidders/nivo/jquery.nivo.slider.js',

    ];
    
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
