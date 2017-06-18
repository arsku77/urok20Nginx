<?php

namespace frontend\models;
use Yii;

/**
 * Class Sender
 * @package frontend\models
 */
class Sender
{

    public static function sendorder($order)
    {

            $viewData = ['order' => $order];

            $result = Yii::$app->mailer->compose('/'.Yii::$app->params['themeCurrentAssets'].'/mailer/order', $viewData)
                ->setFrom(Yii::$app->params['offerorEmail'])
                ->setTo($order['email'])
                ->setSubject('Потверждение')
                ->send();
            if ($result) {//save to log file

                Saver::save(Timeget::getTimelog().' Потвержд. висланно по ' .
                    $order['email'] . ' сообщение содерж.: ' .
                    $order['name']. ' ширина: ' .
                    $order['withWindow'] . ' высота: ' .
                    $order['heightWindow'] . ', ' .
                    $order['color']);
                return true;
            }

        return false;
    }

}