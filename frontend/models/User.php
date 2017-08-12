<?php

namespace frontend\models;

use yii\db\ActiveRecord;
use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 */
class User extends ActiveRecord implements IdentityInterface
{
    const USER_REGISTERED = 'user_registered';//set event name

    public function init()
    {
        $this->on(self::USER_REGISTERED, [Yii::$app->emailService, 'notifyAdmins']);
        $this->on(self::USER_REGISTERED, [Yii::$app->emailService, 'notifyUser']);
        parent::init();

    }


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @param $username
     * @return array|null|\yii\db\ActiveRecord (object)
     */
    public static function findByUsername($username)
    {
        return self::find()->where(['username' => $username])->one();//grazinam sios klases objekta
    }

    public function validatePassword($password)
    {
//        print_r($password);die;
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }


    /**
     * Finds an identity by the given ID.
     *
     * @param string|int $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);//grąžina userio objektą pagal  id
    }

    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);//grąžina userio objektą pagal  tokiną (naudojamas Rest applikacijose
    }

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->id;//grąžina identifikatorių
    }

    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
        return $this->auth_key;//darbui su cookie - su įsimintu useriu pagal auth_key - gauna jį iš DB
    }

    /**
     * @param string $authKey
     * @return bool if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;//tikrina, ar atitinka autentifikacijos kodai - kur atėjo su esamu DB
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

}
