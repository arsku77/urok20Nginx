<?php

namespace frontend\controllers;
use Yii;
use yii\web\Controller;
use frontend\models\Test;

/**
 * Class NewstController
 * @package frontend\controllers
 */
class NewsController extends Controller
{
    /**
     * @return string html tags
     */
    /**
     * @return string html tags
     */
    public function actionIndex()
    {
        $countAllNews=0;
        $max = Yii::$app->params['maxNewsInList'];
        $list = Test::getNewsList($max);
        $countAllNews = Test::getCountAllNews();
//       print_r($list);die;
        return $this->render('index', [
            'list' => $list,
            'countAllNews' => $countAllNews,
        ]);
    }
    /**
     * @param $id
     * @return html tags string
     */
    public function actionView($id)
    {
        //echo $id;die;
        $item = Test::getItem($id);//is modelio gaunam vienos naujienos masyva
        //perduodam view'sui straipsni
        return $this->render('view', [
            'item' => $item
        ]);
    }


    public function actionList()
    {
        //$max = Yii::$app->params['maxNewsInList'];

        $list = Test::getAllNewsList();

//       print_r($list);die;
        return $this->render('index', [
            'list' => $list,
        ]);
    }

}