<?php
/**
 * Created by PhpStorm.
 * User: arsku
 * Date: 2017.07.26
 * Time: 09:40
 */
namespace frontend\models\events;
use yii\base\Event;
use frontend\models\User;
use common\components\UserNotificationInterface;

class UserRegisterEvent extends Event implements UserNotificationInterface
{
    /**
     * @var User
     */
    public $user;

    /**
     * @var string
     */
    public $subject;

    /**
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->user->email;
    }

}