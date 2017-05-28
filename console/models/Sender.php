<?php
/**
 * Created by PhpStorm.
 * User: arsku
 * Date: 2017.05.25
 * Time: 22:21
 */

namespace console\models;
use Yii;

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

}