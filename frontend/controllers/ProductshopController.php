<?php

namespace frontend\controllers;
use frontend\models\Category;
use frontend\models\Product;
use frontend\models\Supplier;
use Yii;

class ProductshopController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $conditions = ['category_id' => 1];
        $productList = Product::find()->where($conditions)->orderBy('date_purchase')->limit(5)->all();

        return $this->render('index', [
            'productList' => $productList,
        ]);
    }

    /**
     * @return string|\yii\web\Response
     * for new Products
     */
    public function actionProduct()
    {
        $product = new Product();

        if ($product->load(Yii::$app->request->post()) && $product->save()) {
            Yii::$app->session->setFlash('success', 'Product Saved!');
            return $this->refresh();
        }

        return $this->render('create_product', [
            'product' => $product,
        ]);
    }


    /**
     * @return string|\yii\web\Response
     * for new Categories
     */
    public function actionCategory()
    {
        $category = new Category();

        if ($category->load(Yii::$app->request->post()) && $category->save()) {
            Yii::$app->session->setFlash('success', 'Category Saved!');
            return $this->refresh();
        }

        return $this->render('create_category', [
            'category' => $category,
        ]);
    }


    /**
     * @return string|\yii\web\Response
     * for new Supplier
     */
    public function actionSupplier()
    {
        $supplier = new Supplier();

        if ($supplier->load(Yii::$app->request->post()) && $supplier->save()) {
            Yii::$app->session->setFlash('success', 'Supplier Saved!');
            return $this->refresh();
        }

        return $this->render('create_supplier', [
            'supplier' => $supplier,
        ]);
    }

}
