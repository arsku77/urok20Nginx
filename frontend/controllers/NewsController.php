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