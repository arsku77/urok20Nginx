<?php

namespace frontend\controllers;
use Yii;
use yii\web\Controller;
use frontend\models\Test;

/**
 * Class TestController
 * @package frontend\controllers
 */
class TestController extends Controller
{
    /**
     * @return string html tags
     */
    public function actionIndex()
    {
        $max = Yii::$app->params['maxNewsInList'];

        $list = Test::getNewsList($max);

//       print_r($list);die;
        return $this->render('index', [
            'list' => $list,
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


    /**
     * @return boolean
     */
    public function actionMail()
    {
        $result = Yii::$app->mailer->compose()
            ->setFrom('arvidija77@gmail.com')
            ->setTo('arsku77@gmail.com')
            ->setSubject('Тема сообųųžžщения')
            ->setTextBody('Текст сообщėęęšėęšėš ųįųįūų čč ения')
            ->setHtmlBody('<b>текст сообщенęęę ššš ия в формате HTML</b>')
            ->send();

        var_dump($result);
        //die;

    }
}