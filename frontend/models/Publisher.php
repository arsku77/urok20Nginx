<?php

namespace frontend\models;
use yii\helpers\ArrayHelper;
use Yii;

/**
 * This is the model class for table "publisher".
 *
 * @property integer $id
 * @property string $name
 * @property string $date_registered
 * @property integer $identity_number
 */
class Publisher extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{publisher}}';
    }
    public function rules()
    {
        return [
            [['name'],'required'],
            [['name', 'identity_number'],'string', 'max'=>30],
            [['date_registered'],'date', 'format'=>'php:Y-m-d'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Vardas',
            'date_registered' => 'Date Registered',
            'identity_number' => 'Identity Number',
        ];
    }

    public static function getList()
    {
        $list = self::find()->asArray()->all();
        return ArrayHelper::map($list,'id','name');

    }


}
