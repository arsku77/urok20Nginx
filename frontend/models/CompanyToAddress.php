<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "company_to_address".
 *
 * @property integer $id
 * @property integer $parent_company_id
 * @property integer $branch_of_company_id
 * @property integer $address_of_company_id
 * @property integer $sort
 * @property string $created_at
 * @property string $updated_at
 * @property integer $active
 * @property integer $archive
 * @property string $date_of_archiving
 */
class CompanyToAddress extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{company_to_address}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_company_id', 'branch_of_company_id', 'address_of_company_id', 'sort', 'active', 'archive'], 'integer'],
            [['created_at', 'updated_at', 'date_of_archiving'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_company_id' => 'Parent Company ID',
            'branch_of_company_id' => 'Branch Of Company ID',
            'address_of_company_id' => 'Address Of Company ID',
            'sort' => 'Sort',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'active' => 'Active',
            'archive' => 'Archive',
            'date_of_archiving' => 'Date Of Archiving',
        ];
    }
}
