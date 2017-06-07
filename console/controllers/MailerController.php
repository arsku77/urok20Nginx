<?php

namespace console\controllers;

use yii\helpers\Console;
use console\models\Newsemployee;
use console\models\Employee;
use console\models\Sender;
use console\models\News;
use console\models\Subscriber;

/**
 * @author admin
 */
class MailerController extends \yii\console\Controller
{

    /**
     * Sending newsletter
     */
    public function actionSend()
    {
        $newsList = News::getList();

        $subscribers = Subscriber::getList();
//        print_r($subscribers); die;
        $count = Sender::run($subscribers, $newsList);
//        Sender::run($subscribers, $newsList);

        Console::output("\nEmails sent: {$count}");
    }

    /**
     * sending message for employee
     */
    public function actionSendempl()
    {
        $newsListContent = Newsemployee::getListContent();
        $employee = Employee::getList();
        $count = Sender::runempl($employee, $newsListContent);

        Console::output("\nEmails sent: {$count}");
    }

}
