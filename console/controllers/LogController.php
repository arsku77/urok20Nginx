<?php

namespace console\controllers;

use yii\helpers\Console;
use console\models\Time;
use console\models\SaveToLogFile;


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
        $timeFormatet = Time::getTime();
        $saveOk = SaveToLogFile::save($timeFormatet);
        if ($saveOk) {
            Console::output("\nLog Write: {$timeFormatet}");
        }else{
            Console::output("\nLog no Write");
        }
   }

}
