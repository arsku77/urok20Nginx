<?php

namespace frontend\controllers;

use frontend\models\Author;
use Yii;
use frontend\controllers\behaviors\AccessBehavior;

class AuthorController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            AccessBehavior::className(),
        ];
    }

    public function actionCreate()
    {
        $model = new Author();

        if ($model->load(Yii::$app->request->post()) && $model->save()){
            Yii::$app->session->setFlash('success', 'Author ' . $model->first_name . ' added');
            return $this->redirect(['author/index']);
        }

        return $this->render('create', [
            'model' => $model
        ]);
    }

    public function actionDelete($id)
    {
        $model = Author::findOne($id);
        $model -> delete();

        Yii::$app->session->setFlash('success', 'Author ' . $model->first_name . ' deleted');

        return $this->redirect(['author/index']);
    }

    public function actionIndex()
    {
        $authorList = Author::find()->all();

        return $this->render('index',[
            'authorList' => $authorList
        ]);
    }

    public function actionUpdate($id)
    {
        $model = Author::findOne($id);//gaumame objekta, su kuriuo galime kaip su nauju - irasyti
        if ($model->load(Yii::$app->request->post()) && $model->save()){
            Yii::$app->session->setFlash('success', 'Author ' . $model->first_name . ' update');
            return $this->redirect(['author/index']);
        }

        return $this->render('update',[
            'model' => $model,
        ]);
    }

}
