<?php

namespace frontend\controllers;

use yii\web\Controller;
use Yii;

/**
 * @author admin
 */
class DaoController extends Controller
{

    public function actionIndex()
    {
//        $db = new \yii\db\Connection([
//            'dsn' => 'mysql:host=localhost;dbname=yii2advanced',
//            'username' => 'root',
//            'password' => 'rootpassw',
//            'charset' => 'utf8',
//        ]);
//        echo '<pre>';
//        var_dump($db);
//        echo '<pre>';
//  #1 DB
        $sql = 'DELETE FROM news WHERE id = 3;';

        $result = Yii::$app->db->createCommand($sql)->execute();

        echo '<pre>';
        var_dump($result);
        echo '<pre>';die;



        return $this->render('index');
//        $sql = 'SELECT * FROM news;';
//        $sql1 = 'DELETE FROM news WHERE id = 3;';
//        $result1 = Yii::$app->db->createCommand($sql1)->execute();
//        echo '<pre>';
//        var_dump($result1);
//        echo '<pre>';die;
//
//
//        return $this->render('index');
    }

}
