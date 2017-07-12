<?php

namespace frontend\widgets\employeeList;

use Yii;
use yii\base\Widget;
use frontend\models\Employee;

/**
 * @author admin
 */
class EmployeeList extends Widget
{
    
    public $showLimit = null;
    
    public function run()
    {
        $max = Yii::$app->params['maxEmployeeInList'];
        if ($this->showLimit) {
            $max = $this->showLimit;
        }

        $list = Employee::getEmployeeListSalary($max);
//        echo 'objektų masyvas';
//        echo '<pre>';
//        print_r($list);
//        echo '<pre>';
//die;
        return $this->render('block', [
            'list' => $list,
        ]);
    }
}
