<?php

namespace frontend\controllers;

use frontend\models\ParentCompany;
use yii\helpers\Url;
use Yii;
use frontend\models\BranchOfCompany;
use frontend\models\BranchOfCompanySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
/**
 * BranchController implements the CRUD actions for BranchOfCompany model.
 */
class BranchController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all BranchOfCompany models.
     * @param bool $flagShowUpdateForm
     * @return mixed
     */
    public function actionIndex($flagShowUpdateForm = false)
    {
        if(Yii::$app->session->has('rememberWentToCartView')){
//            $urlTesting = Yii::$app->session->get('rememberWentToCartView');
            $urlTesting = Url::previous('rememberWentToCartView');//
            //print_r($urlTesting);die;
            Yii::$app->session->remove('rememberWentToCartView');
//            print_r(Yii::$app->session->get('rememberWentToCartView'));
//            Yii::$app->session->remove('rememberWentToCartView');
            return $this->redirect($urlTesting);

        }
        $model = new BranchOfCompany();
        $searchModel = new BranchOfCompanySearch($flagShowUpdateForm);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $company = ParentCompany::getList();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'company' => $company,
            'model' => $model,
        ]);
    }

    /**
     * Displays a single BranchOfCompany model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new BranchOfCompany model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BranchOfCompany();
        $company = ParentCompany::getList();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            print_r($model);die;
            $this->redirect(Yii::$app->request->referrer);
            //            return $this->redirect(['index']);
//            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'company' => $company,
            ]);
        }
    }

    /**
     * Updates an existing BranchOfCompany model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $company = ParentCompany::getList();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
            $this->redirect(Yii::$app->request->referrer);

        } else {
//            print_r($company);die;
            return $this->render('update', [
                'model' => $model,
                'company' => $company,
            ]);
        }
    }

    /**
     * Deletes an existing BranchOfCompany model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the BranchOfCompany model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BranchOfCompany the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BranchOfCompany::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
