<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "branch_of_company".
 *
 * @property integer $id
 * @property integer $parent_company_id
 * @property string $name
 * @property string $email
 * @property string $isbn
 * @property string $date_foundation
 * @property string $alias
 * @property integer $sort
 */
class BranchOfCompany extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{branch_of_company}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'parent_company_id', 'date_foundation', 'alias'], 'required'],
            [['parent_company_id', 'sort'], 'integer'],
            [['date_foundation'],'date', 'format'=>'php:Y-m-d'],
            [['name', 'email'], 'string', 'max' => 255],
            [['isbn'], 'string', 'max' => 30],
            [['alias'], 'string', 'max' => 55],
        ];
    }

    /**
     * @return string
     * get formated data
     */
    public function getDateFoundation()
    {
        return ($this->date_foundation) ? Yii::$app->formatter->asDatetime($this->date_foundation,'yyyy-MM-dd') : "Not set";
    }

/*---------join branches companies to parent company: start-------*/

    /**
     * @return ParentCompany|null
     * join to parent company
     */
    public function getParentCompany()
    {
        return $this->hasOne(ParentCompany::className(), ['id' => 'parent_company_id']);
    }
/*---------join branches companies to parent company: end -------*/


    /**
     * @return string
     * get parent company name
     */
    public function getParentCompanyName()
    {
         return (isset($this->parentCompany))?$this->parentCompany->name:' Parent Company name not set';
    }


/*----get array addresses of branch company with one ids branches start------------*/

    /**
     * @return ActiveQuery
     * relate branch company to address via company_to_address
     */
    public function getCompanyToAddressRelations()
    {
        return $this->hasMany(CompanyToAddress::className(), ['branch_of_company_id' => 'id']);
    }

    /**
     * @return Address_Branches[]
     * one branches
     */
    public function getAddressOfBranches()
    {
        return $this->hasMany(AddressOfCompany::className(), ['id' => 'address_of_company_id'])->via('companyToAddressRelations')->all();
    }
/*----get array addresses of branch company with one ids branches end---------*/



    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_company_id' => 'Parent Company ID',
            'name' => 'Name',
            'email' => 'Email',
            'isbn' => 'Isbn',
            'date_foundation' => 'Date Foundation',
            'alias' => 'Alias',
            'sort' => 'Sort',
        ];
    }

    /**
     * @return mixed
     * list for lists
     */
    public static function getList()
    {
        $list = self::find()->asArray()->all();
        return ArrayHelper::map($list,'id','name');

    }

}
