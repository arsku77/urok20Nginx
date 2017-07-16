<?php

namespace frontend\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "parent_company".
 *
 * @property integer $id
 * @property string $name
 * @property string $id_code
 * @property string $vat_code
 * @property string $isbn
 * @property string $date_foundation
 */
class ParentCompany extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{parent_company}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'id_code'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['id_code', 'vat_code', 'isbn'], 'string', 'max' => 30],
            [['date_foundation'],'date', 'format'=>'php:Y-m-d'],
        ];
    }



    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'id_code' => 'Id Code',
            'vat_code' => 'Vat Code',
            'isbn' => 'Isbn',
            'date_foundation' => 'Date Foundation',
        ];
    }

    public static function getList()
    {
        $list = self::find()->asArray()->all();
//print_r(ArrayHelper::map($list,'id','name'));die;
        return ArrayHelper::map($list,'id','name');

    }

}
