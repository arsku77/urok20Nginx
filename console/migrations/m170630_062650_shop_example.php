<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product`.
 */
class m170630_062650_shop_example extends Migration
{

    public function up()
    {
        $this->createProducts();
        $this->createSuppliers();
        $this->createProductsToSuppliers();
        $this->createCategories();
    }

    public function down()
    {
        $this->dropTable('product');
        $this->dropTable('supplier');
        $this->dropTable('product_to_supplier');
        $this->dropTable('category');
    }

    private function createProducts()
    {
        $this->createTable('product', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'price' => $this->money(),
            'isbn' => $this->string(),
            'date_purchase' => $this->date(),
            'category_id' => $this->integer(),
        ]);

        $this->insert('product', [
            'id' => 1,
            'name' => 'omar',
            'price' => '11.0584',
            'isbn' => '8934638534',
            'date_purchase' => '2015-01-21',
            'category_id' => 1,
        ]);

        $this->insert('product', [
            'id' => 2,
            'name' => 'langust',
            'price' => '55.0577',
            'isbn' => '12978054744',
            'date_purchase' => '2014-05-02',
            'category_id' => 1,
        ]);

        $this->insert('product', [
            'id' => 3,
            'name' => 'Dell',
            'price' => '101.0584',
            'isbn' => '967846395',
            'date_purchase' => '2007-10-12',
            'category_id' => 2,
        ]);

        $this->insert('product', [
            'id' => 4,
            'name' => 'Samsung',
            'price' => '951.0784',
            'isbn' => '213987678',
            'date_purchase' => '2008-01-01',
            'category_id' => 3,
        ]);

        $this->insert('product', [
            'id' => 5,
            'name' => 'LG 123456',
            'price' => '45.0384',
            'isbn' => '235975694',
            'date_purchase' => '2010-02-27',
            'category_id' => 3,
        ]);

        $this->insert('product', [
            'id' => 6,
            'name' => 'Main Maria',
            'price' => '489.0580',
            'isbn' => '078224745',
            'date_purchase' => '2010-04-27',
            'category_id' => 5,
        ]);

        $this->insert('product', [
            'id' => 7,
            'name' => 'Santa Marija',
            'price' => '23.0544',
            'isbn' => '749579432',
            'date_purchase' => '2005-05-30',
            'category_id' => 5,
        ]);
    }

    private function createCategories()
    {
        $this->createTable('category', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'date_registered' => $this->date(),
            'alias' => $this->string(55),
        ]);

        $this->insert('category', [
            'id' => 1,
            'name' => 'foods',
            'date_registered' => '2015-01-21',
            'alias' => 'foods1',
        ]);

        $this->insert('category', [
            'id' => 2,
            'name' => 'compiuters',
            'date_registered' => '2014-05-02',
            'alias' => 'compiut2',
        ]);

        $this->insert('category', [
            'id' => 3,
            'name' => 'televizors',
            'date_registered' => '2007-10-12',
            'alias' => 'televiz3',
        ]);

        $this->insert('category', [
            'id' => 4,
            'name' => 'automobiles',
            'date_registered' => '2008-01-01',
            'alias' => 'automobil4',
        ]);

        $this->insert('category', [
            'id' => 5,
            'name' => 'ships',
            'date_registered' => '2010-02-27',
            'alias' => 'ships5',
        ]);

    }

    private function createSuppliers()
    {
        $this->createTable('supplier', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'company_code' => $this->string(),
            'foundation_date' => $this->date(),
            'rating' => $this->integer(),
        ]);

        $this->insert('supplier', [
            'id' => 1,
            'name' => 'JSC Джордж',
            'company_code' => '165740558',
            'foundation_date' => '1920-01-05',
            'rating' => 53,
        ]);

        $this->insert('supplier', [
            'id' => 2,
            'name' => 'JSC Даниел',
            'company_code' => '265740558',
            'foundation_date' => '1930-01-15',
            'rating' => 85,
        ]);

        $this->insert('supplier', [
            'id' => 3,
            'name' => 'JSC Грегори',
            'company_code' => '365740558',
            'foundation_date' => '1950-06-05',
            'rating' => 79,
        ]);

        $this->insert('supplier', [
            'id' => 4,
            'name' => 'JSC Элизабет',
            'company_code' => '175740558',
            'foundation_date' => '1962-11-07',
            'rating' => 90,
        ]);

        $this->insert('supplier', [
            'id' => 5,
            'name' => 'JSC Эрик',
            'company_code' => '166740558',
            'foundation_date' => '1967-01-08',
            'rating' => 92,
        ]);

        $this->insert('supplier', [
            'id' => 6,
            'name' => 'JSC Ричард',
            'company_code' => '165750558',
            'foundation_date' => '1967-01-08',
            'rating' => 77,
        ]);

        $this->insert('supplier', [
            'id' => 7,
            'name' => 'JSC Эрих',
            'company_code' => '165740758',
            'foundation_date' => '1950-02-10',
            'rating' => 70,
        ]);

        $this->insert('supplier', [
            'id' => 8,
            'name' => 'JSC Ричард',
            'company_code' => 'Хелм',
            'foundation_date' => '1953-02-10',
            'rating' => 70,
        ]);

        $this->insert('supplier', [
            'id' => 9,
            'name' => 'JSC Ральф',
            'company_code' => '165740559',
            'foundation_date' => '1952-02-10',
            'rating' => 70,
        ]);

        $this->insert('supplier', [
            'id' => 10,
            'name' => 'JSC Джон',
            'company_code' => '165744558',
            'foundation_date' => '1951-02-10',
            'rating' => 70,
        ]);

    }

    private function createProductsToSuppliers()
    {
        $this->createTable('product_to_supplier', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer(),
            'supplier_id' => $this->integer(),
        ]);

        $this->insert('product_to_supplier', [
            'id' => 1,
            'product_id' => 1,
            'supplier_id' => 3,
        ]);

        $this->insert('product_to_supplier', [
            'id' => 2,
            'product_id' => 2,
            'supplier_id' => 1,
        ]);

        $this->insert('product_to_supplier', [
            'id' => 3,
            'product_id' => 3,
            'supplier_id' => 2,
        ]);

        $this->insert('product_to_supplier', [
            'id' => 4,
            'product_id' => 4,
            'supplier_id' => 6,
        ]);

        $this->insert('product_to_supplier', [
            'id' => 5,
            'product_id' => 5,
            'supplier_id' => 3,
        ]);

        $this->insert('product_to_supplier', [
            'id' => 6,
            'product_id' => 6,
            'supplier_id' => 4,
        ]);

        $this->insert('product_to_supplier', [
            'id' => 7,
            'product_id' => 6,
            'supplier_id' => 5,
        ]);

        $this->insert('product_to_supplier', [
            'id' => 8,
            'product_id' => 7,
            'supplier_id' => 7,
        ]);

        $this->insert('product_to_supplier', [
            'id' => 9,
            'product_id' => 7,
            'supplier_id' => 8,
        ]);

        $this->insert('product_to_supplier', [
            'id' => 10,
            'product_id' => 7,
            'supplier_id' => 9,
        ]);

        $this->insert('product_to_supplier', [
            'id' => 11,
            'product_id' => 7,
            'supplier_id' => 10,
        ]);
    }
}
