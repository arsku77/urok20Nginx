<?php

namespace frontend\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property string $price
 * @property string $isbn
 * @property string $date_purchase
 * @property int $category_id
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{product}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['price'], 'number'],
            [['date_purchase'], 'safe'],
            [['category_id'], 'integer'],
            [['name', 'isbn'], 'string', 'max' => 255],
        ];
    }

    public function getCategoriesList()
    {
//        $sql = 'SELECT * FROM category';
//        $result = Yii::$app->db->createCommand($sql)->queryAll();
        $categoriesList = \frontend\models\Category::find()->all();
        return ArrayHelper::map($categoriesList, 'id', 'name');
    }


    /**
     * @return string
     */
    public function getDatePurchase()
    {
        return ($this->date_purchase) ? Yii::$app->formatter->asDatetime($this->date_purchase,'dd-MM-yyyy') : "Not set";
    }

    /**
     * @return category|null
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id'])->one();
    }

    /**
     * @return string category name
     */
    public function getCategoryName()
    {
        if ($category = $this->getCategory()) {
            return $category->name;
        }
        return "Not set category";
    }


    /*---------------------Relate product to supplier---start-------------*/
    /**
     * @return ActiveQuery
     */
    public function getProductToSupplierRelations()
    {
        return $this->hasMany(ProductToSupplier::className(), ['product_id' => 'id']);
    }

    /**
     * @return Supplier[]
     */
    public function getSuppliers()
    {
        return $this->hasMany(Supplier::className(), ['id' => 'supplier_id'])->via('productToSupplierRelations')->all();
    }

    /*---------------------Relate product to supplier ---end -------------*/




    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'price' => 'Price',
            'isbn' => 'Bar code',
            'date_purchase' => 'Date Purchase',
            'category_id' => 'Category ID',
        ];
    }
}
