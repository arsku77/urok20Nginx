<?php

namespace frontend\models\forms;
use yii\base\Model;
use frontend\models\User;
use Yii;
use frontend\models\events\UserRegisterEvent;
/**
 * Created by PhpStorm.
 * User: arsku
 * Date: 2017.07.20
 * Time: 11:51
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],//suvalgo tuscius tarpus priekyje ir gale
            ['username', 'required'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            [['username'], 'unique', 'targetClass' => User::className()],
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            [['email'], 'unique', 'targetClass' => User::className()],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];

    }

    /**

     * Save user

     * @return User|null

     */

    public function save()
    {
        if ($this->validate()) {
            $user = new User();

            $user->email = $this->email;
            $user->username = $this->username;
            $user->created_at = $time = time();//current date
            $user->updated_at = $time;
            $user->auth_key = Yii::$app->security->generateRandomString();
            $user->password_hash = Yii::$app->security->generatePasswordHash($this->password);

            if ($user->save()) {

                $event = new UserRegisterEvent();
                $event->user = $user;
                $event->subject = 'New Useerr registered';
                $user->trigger(User::USER_REGISTERED, $event);

                return $user;
            }

        }

    }

}