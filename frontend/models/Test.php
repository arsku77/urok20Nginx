<?php

namespace frontend\models;
use Yii;

/**
 * Class Test
 * @package frontend\models
 */
class Test
{
    /**
     * @return modified array
     */
    public static function getAllNewsList()
    {
        $sql = 'SELECT * FROM news' ;
        $result = Yii::$app->db->createCommand($sql)->queryAll();


        if(!empty($result) && is_array($result)) {
            foreach ($result as &$item) {//žemiau yra mūs sukurtas komponentas
                $item['content'] = Yii::$app->stringHelper->getShort($item['content']);
            }
        }
        return $result;//grąžinam jau modifikuotą masyvą - jame pakeistas turinys content
    }

    /**
     * @param integer $max
     * @return array
     */
    public static function getNewsList($max)
    {
        $max = intval($max);
        $sql = 'SELECT * FROM news LIMIT ' . $max ;
        $result = Yii::$app->db->createCommand($sql)->queryAll();

        // $helper = Yii::$app->stringHelper;

        if(!empty($result) && is_array($result)) {
            foreach ($result as &$item) {//žemiau yra mūs sukurtas komponentas
                $item['content'] = Yii::$app->stringHelper->getShort($item['content']);
            }
        }
        return $result;//grąžinam jau modifikuotą masyvą - jame pakeistas turinys content
    }


    /**
     * @param integet $id
     * @return array|false
     */
    public static function getItem($id)
    {
        $id = intval($id);
        $sql = "SELECT * FROM news WHERE id = $id";
        //gaunam duomenis is bazes
        return Yii::$app->db->createCommand($sql)->queryOne();
    }
}