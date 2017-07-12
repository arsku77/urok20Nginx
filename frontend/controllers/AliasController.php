<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;

class AliasController extends Controller
{

    public function actionExample()
    {
//      $result= mkdir(Yii::getAlias('@files').'/test5');
//      var_dump($result);die;
//        echo Yii::getAlias('@photos');
        echo Yii::getAlias('@runtime');
    }

}
