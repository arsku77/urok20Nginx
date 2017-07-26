<?php
/**
 * Created by PhpStorm.
 * User: arsku
 * Date: 2017.07.25
 * Time: 09:44
 */

namespace common\components;

use Yii;
use yii\base\Component;
use common\components\UserNotificationInterface;
use frontend\models\events\UserRegisterEvent;

class EmailService extends Component
{

    /**
     * @param UserNotificationInterface $event
     * @param string $subject
     * @return bool
     */
    public function notifyUser(UserNotificationInterface $event)
    {
        return Yii::$app->mailer->compose()
            ->setFrom('arsku77@gmail.com')
            ->setTo($event->getEmail())
            ->setSubject($event->getSubject())
            ->send();
    }

    /**
     * @param UserNotificationInterface $event
     * @return bool
     */
    public function notifyAdmins(UserNotificationInterface $event)
    {
//        echo '<pre>';
//        print_r($event);
//        echo '<pre>';
//        die;
        return Yii::$app->mailer->compose()
            ->setFrom('arsku77@gmail.com')
            ->setTo('arsku77@gmail.com')
            ->setSubject($event->getSubject())
            ->send();
    }

}