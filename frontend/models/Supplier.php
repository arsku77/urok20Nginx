<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "supplier".
 *
 * @property int $id
 * @property string $name
 * @property string $company_code
 * @property string $foundation_date
 * @property int $rating
 */
class Supplier extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{supplier}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['foundation_date'], 'safe'],
            [['rating'], 'integer'],
            [['name', 'company_code'], 'string', 'max' => 255],
        ];
    }
    /**
     * @return string
     * full name from last and first names
     */
    public function getFullRequisites()
    {
        return $this->name . ' ' . $this->company_code;
    }

    /*---------------------Relate supplier to product---start-------------*/
    /**
     * @return ActiveQuery
     */
    public function getSupplierToProductRelations()
    {
        return $this->hasMany(ProductToSupplier::className(), ['supplier_id' => 'id']);
    }

    /**
     * @return Supplier[]
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['id' => 'product_id'])->via('supplierToProductRelations')->all();
    }

    /*---------------------Relate supplier to product ---end -------------*/


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Company Name',
            'company_code' => 'Company Code',
            'foundation_date' => 'Foundation Date',
            'rating' => 'Rating',
        ];
    }
}
