<?php
/**
 * Created by PhpStorm.
 * User: arsku
 * Date: 2017.05.25
 * Time: 22:21
 */

namespace console\models;
use Yii;
use yii\helpers\ArrayHelper;
use console\models\Saver;
use console\models\Timeget;
class Sender
{

    /**
     * Send emails to subscribers with contents of news
     * @param array $subscribers
     * @param array $newsList
     */
    public static function run($subscribers, $newsList)
    {
        $viewData = ['newsList' => $newsList];

        $count = 0;

        foreach ($subscribers as $subscriber) {
            $result = Yii::$app->mailer->compose('/mailer/newslist', $viewData)
                ->setFrom('arvidija77@gmail.com')
                ->setTo($subscriber['email'])
                ->setSubject('Тема сообщения')
                ->send();
            if ($result) {
                $count++;
            }
        }
        return $count;
    }


    public static function runempl($employees, $newsListContent)
    {

//        $viewData = ['newsListContent' => $newsListContent];

//        print_r($viewData); die;
        $count = 0;

        foreach ($employees as $employee) {
            $viewData = ['newsListContent' => ArrayHelper::merge($newsListContent, $employee)];
//            echo '<pre>';
//            print_r($viewData);
//            echo '</pre>';die;

            $result = Yii::$app->mailer->compose('/mailer/newsempl', $viewData)
                ->setFrom('arvidija77@gmail.com')
                ->setTo($employee['email'])
                ->setSubject('Message')
                ->send();
            if ($result) {//save to log file
                Saver::save(Timeget::getTimelog().' висланно по ' .
                    $employee['email'] . ' сообщение содерж.: Уважаемый ' .
                    $employee['first_name']. ' ' .
                    $employee['last_name'] . '! ' .
                    $newsListContent['content'] . ', с названием: ' .
                    $newsListContent['name']);
                $count++;
            }
        }
        return $count;
    }


    public static function sendorder($order)
    {

//        $viewData = ['newsListContent' => $newsListContent];

//        print_r($viewData); die;
        $count = 0;

            $viewData = ['order' => $order];
            echo '<pre>';
            print_r($viewData);
            echo '</pre>';

            $result = Yii::$app->mailer->compose('/mailer/order', $viewData)
                ->setFrom('arvidija77@gmail.com')
                ->setTo($order['email'])
                ->setSubject('Message')
                ->send();
            if ($result) {//save to log file
                Saver::save(Timeget::getTimelog().' висланно по ' .
                    $order['email'] . ' сообщение содерж.: ' .
                    $order['name']. ' ' .
                    $order['withWindow'] . '! ' .
                    $order['heightWindow'] . ', с названием: ' .
                    $order['color']);
                return true;
            }

        return false;
    }

}