<?php

namespace frontend\models\forms;
use yii\base\Model;
use frontend\models\User;
use Yii;
/**
 * Created by PhpStorm.
 * User: arsku
 * Date: 2017.07.20
 * Time: 11:51
 */
class LoginForm extends Model
{
    public $username;
    public $password;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],//suvalgo tuscius tarpus priekyje ir gale
            ['username', 'required'],
            ['password', 'required'],
            ['password', 'validatePassword'],//savo validatorius -> bus User modelio metodas validatePassword(password)
        ];
    }

    public function login()
    {
        if ($this->validate()) {
            $user = User::findByUsername($this->username);
            return Yii::$app->user->login($user);
        }
        return false;
    }

    public function validatePassword($attribute, $params)
    {
        $user = User::findByUsername($this->username);
//        print_r($user);die;
        if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute,'Incorrect password');

        }

    }

}