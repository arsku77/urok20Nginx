<?php
/**
 * Created by PhpStorm.
 * User: arsku
 * Date: 2017.07.26
 * Time: 20:17
 */

namespace frontend\controllers\behaviors;
use yii\base\Behavior;
use Yii;
use yii\base\Controller;
class AccessBehavior extends Behavior
{
    public function events()
    {
        return [
            Controller::EVENT_BEFORE_ACTION => 'checkAccess',
        ];
    }

    public function checkAccess()
    {
        if (Yii::$app->user->isGuest){
            return Yii::$app->controller->redirect(['site/index']);
        }

    }


}