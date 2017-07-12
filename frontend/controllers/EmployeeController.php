<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\Employee;

use frontend\models\example\Animal;
use frontend\models\example\Human;

class EmployeeController extends Controller
{

    public function actionIndex()
    {
        $employee1 = new Employee();
        $employee1->firstName = 'Alex';
        $employee1->lastName = 'Smith';
        $employee1->middleName = 'John';
        $employee1->salary = 1000;

        echo $employee1['salary'];

        echo '<hr>praeinam po visą objektą<br>';

        foreach ($employee1 as $attribute => $value) {
            echo "$attribute: $value <br>";
        }

        echo '<hr>';

        $array = $employee1->toArray();
        echo 'objektų masyvas';
        echo '<pre>';
        print_r($array);
        echo '<pre>';

        echo '<hr>';

        echo '<pre> getAttributes<br>';
        print_r($employee1->getAttributes());
        print_r($employee1->attributes);
        echo '<pre>';

        echo '<pre> atributai<br>';
        print_r($employee1->attributes());
        echo '<pre>';die;





    }

    public function actionView($id)
    {
        $item = Employee::getItem($id);

        return $this->render('view', [
            'item' => $item
        ]);
    }


    public function actionTest()
    {
        $human1 = new Human();
        $animal1 = new Animal();

        $animal1->walk();
        echo '<br>';
        $human1->walk();
    }

    public function actionRegister()
    {
        $model = new Employee();
        $model->scenario = Employee::SCENARIO_EMPLOYEE_REGISTER;

//        $formData = Yii::$app->request->post();
        if (Yii::$app->request->isPost) {
//            echo '<pre>';
//            print_r($formData);
//            echo '</pre>';die;

//            $model->attributes = $formData;
            $model->load(Yii::$app->request->post());
//            $model->firstName = $formData['firstName'];
//            echo '<pre>';
//            print_r($model->attributes);
//            print_r($model);
//            echo '</pre>';die;

            if ($model->validate() && $model->save()) {
                Yii::$app->session->setFlash('success', 'Registered!');
            }
        }

        return $this->render('register', [
            'model' => $model,
        ]);
    }

    public function actionUpdate()
    {
        $model = new Employee();
        $model->scenario = Employee::SCENARIO_EMPLOYEE_UPDATE;

        $formData = Yii::$app->request->post();

        if (Yii::$app->request->isPost) {

            $model->attributes = $formData;

            if ($model->validate() && $model->save()) {
                Yii::$app->session->setFlash('success', 'Data updated!');
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

}