<?php
/**
 * Created by PhpStorm.
 * User: arsku
 * Date: 2017.05.28
 * Time: 16:25
 */

namespace console\models;
use Yii;

class Employee
{
    const NEED_SEND = 1;//if =0 not need, =1 need send


    public static function getList()
    {
//        $sql = 'SELECT * FROM employee WHERE need_send =' . self::NEED_SEND;
        $sql = 'SELECT * FROM employee';
        return Yii::$app->db->createCommand($sql)->queryAll();
    }

}