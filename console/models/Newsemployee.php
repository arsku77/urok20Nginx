<?php
/**
 * Created by PhpStorm.
 * User: arsku
 * Date: 2017.05.28
 * Time: 16:16
 */

namespace console\models;
use Yii;

/**
 * Class Newsemployee
 * @package console\models
 */
class Newsemployee
{

    const LIMIT_NEWS = 1;


    public static function getListContent()
    {
        $sql = 'SELECT * FROM newsemployee LIMIT ' . self::LIMIT_NEWS;
        return Yii::$app->db->createCommand($sql)->queryOne();
    }

}