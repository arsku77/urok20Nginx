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

class EmailService extends Component
{

    /**
     * @param UserNotificationInterface $user
     * @param string $subject
     * @return bool
     */
    public function notifyUser(UserNotificationInterface $user, $subject)
    {
        return Yii::$app->mailer->compose()
            ->setFrom('arsku77@gmail.com')
            ->setTo($user->getEmail())
            ->setSubject($subject)
            ->send();
    }

    /**
     * @param $subject
     * @return bool
     */
    public function notifyAdmins($subject)
    {
        return Yii::$app->mailer->compose()
            ->setFrom('arsku77@gmail.com')
            ->setTo('arsku77@gmail.com')
            ->setSubject($subject)
            ->send();
    }

}