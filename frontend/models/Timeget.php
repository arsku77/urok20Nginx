<?php
/**
 * Created by PhpStorm.
 * User: arsku
 * Date: 2017.05.25
 * Time: 19:50
 */

namespace frontend\models;
use Yii;

class Timeget
{
    /**
     * @return string
     */
    public static function getTimelog()
    {
        $time = time();//get timestamp, format in  http://userguide.icu-project.org/formatparse/datetime
        return Yii::$app->formatter->asDatetime($time, $format = 'yyyy-MM-dd HH:mm:ss');
    }

}