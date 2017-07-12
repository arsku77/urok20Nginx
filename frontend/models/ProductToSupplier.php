<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "product_to_supplier".
 *
 * @property int $id
 * @property int $product_id
 * @property int $supplier_id
 */
class ProductToSupplier extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{product_to_supplier}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'supplier_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'supplier_id' => 'Supplier ID',
        ];
    }
}
