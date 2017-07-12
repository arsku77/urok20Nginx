<?php
/**
 * Created by PhpStorm.
 * User: arsku
 * Date: 2017.05.25
 * Time: 19:50
 */

namespace console\models;
use Yii;

class Subscriber
{
    /**
     * Return all subscribers
     * @return array
     */
    public static function getList()
    {
        $sql = 'SELECT * FROM subscriber';
        return Yii::$app->db->createCommand($sql)->queryAll();
    }

}