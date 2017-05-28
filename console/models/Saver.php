<?php
/**
 * Created by PhpStorm.
 * User: arsku
 * Date: 2017.05.26
 * Time: 13:00
 */

namespace console\models;
use Yii;

/**
 * Class Saver
 * @package console\models
 */
class Saver
{
    /**
     * @param $string
     * @return boolean
     */
    public static function save($string)
    {
       $fileName = 'log';
       $file = dirname(dirname(__DIR__)) . '/frontend/web/'.$fileName.'.txt';
//     $file = '/var/www/project/frontend/web/'.$fileName.'.txt';
       file_put_contents($file, $string."\n", FILE_APPEND);
    }

}