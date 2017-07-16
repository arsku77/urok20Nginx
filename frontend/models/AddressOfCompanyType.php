<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "address_of_company_type".
 *
 * @property integer $id
 * @property string $name
 * @property integer $active
 */
class AddressOfCompanyType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'address_of_company_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['active'], 'integer'],
            [['name'], 'string', 'max' => 255],
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
            'active' => 'Active',
        ];
    }
}
