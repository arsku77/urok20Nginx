<?php

namespace frontend\controllers;

use frontend\models\forms\SignupForm;

use Yii;

class UserController extends \yii\web\Controller
{
    public function actionLogin()
    {
        return $this->render('login');
    }




    public function actionSignup()
    {
        $model = new SignupForm();

        if ($model->load(Yii::$app->request->post()) && $user = $model->save()) {

       //     Yii::$app->user->login($user);

            Yii::$app->session->setFlash('success', 'User registered!');
            return $this->redirect(['site/index']);
        }

        return $this->render('signup', [

            'model' => $model,
        ]);
    }
}
