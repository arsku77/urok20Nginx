<?php

namespace frontend\controllers;

use Yii;
use Faker\Factory;
use yii\web\Controller;
Use frontend\models\News;

class TestController extends Controller
{

    public function actionGenerate()
    {

        $faker = Factory::create();

        $newsItem = new News();

        $newsItem->title = $faker->text(35);
        $newsItem->content = $faker->text(rand(1000, 2000));
        $newsItem->status = rand(0, 1);

        $newsItem->save();

        die('stop');


        //        ini_set('max_execution_time', 10000);
//
//        /* @var $faker Faker Generator */
//        $faker = Factory::create();
//
//        for ($j = 0; $j < 1000; $j++) {
//
//            $news = [];
//            for ($i = 0; $i < 1000; $i++) {
//                $news[] = [$faker->text(35), $faker->text(rand(1000, 2000)), rand(0, 1)];
//            }
//            Yii::$app->db->createCommand()->batchInsert('news', ['title', 'content', 'status'], $news)->execute();
//            unset($news);
//
//        }
//
//        return $this->render('generate');
    }

}