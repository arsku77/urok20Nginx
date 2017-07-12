<?php
/**
 * Created by PhpStorm.
 * User: arsku
 * Date: 2017.06.01
 * Time: 20:04
 */

namespace frontend\controllers;
use Yii;
use yii\web\Controller;
use frontend\models\Window;


/**
 * Class WindowController
 * @package frontend\controllers
 */
class WindowController extends Controller
{
    public function actionOrder()
    {
        $model = new Window();
        $model->scenario = Window::SCENARIO_WINDOW_ORDER;
        $model->windowSillIsNeed = true;
        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
//            echo '<pre>';
//            print_r($model);
//            echo '</pre>';die;

            if ($model->validate() && $model->save() && $model->send()) {
                Yii::$app->session->setFlash('success', 'Order placed! you send confirmation');
            }
        }

        return $this->render('order', [
            'model' => $model,
        ]);
    }

}