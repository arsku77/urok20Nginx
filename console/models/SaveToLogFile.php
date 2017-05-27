<?php
/**
 * Created by PhpStorm.
 * User: arsku
 * Date: 2017.05.26
 * Time: 13:00
 */

namespace console\models;
use Yii;

class SaveToLogFile
{
    /**
     * @param $string
     * @return boolean
     */
    public static function save($string)
    {
        $fileName = 'log';
        $txt = $string;

        $file = './frontend/web/'.$fileName.'.txt';
        $content = file_get_contents($file);

        $content .= $txt."\n";
       return file_put_contents($file, $content);

    }

}