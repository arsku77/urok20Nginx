<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class Comment extends Model
{

    const SCENARIO_COMMENT_REGISTER = 'comment_register';
    const SCENARIO_COMMENT_UPDATE = 'comment_update';


    public $name;
    public $email;
    public $parentId;
    public $text;
    public $verifyCode;


    public function scenarios()
    {

        return [
            self::SCENARIO_COMMENT_REGISTER => ['parentId', 'name', 'email', 'text',],
            self::SCENARIO_COMMENT_UPDATE => ['name', 'text',],
        ];
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'text'], 'required'],
//            ['email', function($attribute) {
//                if(static::findOne(['email' => Yii::$app->encrypter->encrypt($this->{$attribute})]))
//                    {
//                    $this->addError($attribute, 'This email is already in use".');
//                }
//            }],

            ['email', 'email'],
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
        ];
    }

    public static function getCommentsList($max)
    {
        $max = intval($max);
        $sql = 'SELECT * FROM comment ORDER BY id DESC LIMIT ' . $max ;
        $result = Yii::$app->db->createCommand($sql)->queryAll();

        return $result;//grąžinam jau modifikuotą masyvą - jame pakeistas turinys content
    }


    public function save()
    {
        $sql = "INSERT INTO comment (id, parent_id, name, email, text) VALUES (null, 1, '{$this->name}', '{$this->email}', '{$this->text}')";
        return Yii::$app->db->createCommand($sql)->execute();
    }
}
