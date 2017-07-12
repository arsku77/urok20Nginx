<?php

namespace console\controllers;

use yii\helpers\Console;
use console\models\Timeget;
use console\models\Saver;


/**
 * @author admin
 */
class LogController extends \yii\console\Controller
{

/**
 * save logs
 */
    public function actionSave()
    {
        $timeFormatet = Timeget::getTimelog();
       return Saver::save($timeFormatet);
    }

}
