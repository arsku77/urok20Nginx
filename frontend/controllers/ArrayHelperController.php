<?php
/**
 * Created by PhpStorm.
 * User: arsku
 * Date: 2017.06.11
 * Time: 21:02
 */

namespace frontend\controllers;


use frontend\models\Employee;

class ArrayHelperController extends \yii\web\Controller
{
    public function actionDemo()
    {
        $employees = Employee::find();
        return $this->render('demo', [
            'employees' =>$employees,
        ]);
    }

}