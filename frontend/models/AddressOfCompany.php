<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "address_of_company".
 *
 * @property integer $id
 * @property integer $address_type_id
 * @property string $post_code
 * @property string $street_or_village
 * @property string $city_or_area
 * @property string $region
 * @property string $country
 * @property string $created_at
 * @property string $updated_at
 * @property integer $active
 * @property integer $archive
 * @property string $date_of_archiving
 */
class AddressOfCompany extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'address_of_company';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['address_type_id', 'active', 'archive'], 'integer'],
            [['street_or_village'], 'string'],
            [['created_at', 'updated_at', 'date_of_archiving'], 'safe'],
            [['post_code'], 'string', 'max' => 30],
            [['city_or_area', 'region', 'country'], 'string', 'max' => 255],
        ];
    }

/*----get array branch of company with one ids address start------------*/
    /**
     * @return ActiveQuery
     */
    public function getCompanyToAddressRelations()
    {
        return $this->hasMany(CompanyToAddress::className(), ['address_of_company_id' => 'id']);
    }

    /**
     * @return Branches_for_one_Address[]
     */
    public function getBranchesCompanies()
    {
        return $this->hasMany(BranchOfCompany::className(), ['id' => 'branch_of_company_id'])->via('companyToAddressRelations')->all();
    }

/*----get array branch of company with one ids address end------------*/





    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'address_type_id' => 'Address Type ID',
            'post_code' => 'Post Code',
            'street_or_village' => 'Street Or Village',
            'city_or_area' => 'City Or Area',
            'region' => 'Region',
            'country' => 'Country',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'active' => 'Active',
            'archive' => 'Archive',
            'date_of_archiving' => 'Date Of Archiving',
        ];
    }
}
