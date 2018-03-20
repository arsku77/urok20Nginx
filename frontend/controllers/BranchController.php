<?php

namespace frontend\controllers;
use yii\base\Model;
use frontend\models\ParentCompany;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use Yii;
use frontend\models\BranchOfCompany;
use frontend\models\BranchOfCompanySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Session;
use yii\web\Response;
use yii\widgets\ActiveForm;


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
     * @param Session $session
     * @return mixed
     */
    public function actionIndex($flagShowUpdateForm = false)
    {
//        $urlTesting =null;
//        if((Yii::$app->session->has('rememberWentToCartView')) && ($flagShowUpdateForm = true)) {
//            $urlTesting = Yii::$app->session->get('rememberWentToCartView');
//            $urlTesting = Url::previous('rememberWentToCartView');
        //print_r($urlTesting);die;
//            Yii::$app->session->remove('rememberWentToCartView');
//            print_r(Yii::$app->session->get('rememberWentToCartView'));
//            Yii::$app->session->remove('rememberWentToCartView');
//            print_r($flagShowUpdateForm . $urlTesting );die;
//            return $this->redirect($urlTesting);
        //  return $this->redirect('http://arvidija.com/branch/index?flagShowUpdateForm=1&BranchOfCompanySearch%5Bid%5D=&BranchOfCompanySearch%5Bparent_company_id%5D=2&BranchOfCompanySearch%5Bname%5D=&BranchOfCompanySearch%5Bemail%5D=&BranchOfCompanySearch%5Bisbn%5D=&BranchOfCompanySearch%5Bdate_foundation%5D=&BranchOfCompanySearch%5Balias%5D=&BranchOfCompanySearch%5Bsort%5D=&flagShowUpdateForm=0
//');

//        }

        $model = new BranchOfCompany();
        $searchModel = new BranchOfCompanySearch($flagShowUpdateForm);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//        print_r(Yii::$app->request->queryParams);die;
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



    public function actionBatchUpdate($flagShowUpdateForm, $idFilterOfIndexView = null)
    {

        $searchModel = new BranchOfCompanySearch($flagShowUpdateForm, $idFilterOfIndexView);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//        print_r(Yii::$app->request->queryParams);die;
        $company = ParentCompany::getList();
    $models = $dataProvider->getModels();
//    $models = Model::createMultiple(BranchOfCompanySearch::class, $dataProvider->getModels());
//        echo '<pre>';
////        print_r(Yii::$app->request->post());
//        print_r($searchModel);
//        echo '<br>';
//        echo '<br>.is naujos eilutes';
//        echo '<br>';
////        print_r(ArrayHelper::map($models, 'id', 'id'));
//        print_r($models);
//        echo '<pre>';
//        die;
    if (Model::loadMultiple($models, Yii::$app->request->post()) && Model::validateMultiple($models)) {
//    if (Model::loadMultiple($models, Yii::$app->request->post())) {
//    if ( Model::validateMultiple($models)) {
        $count = 0;

//        echo '<pre>';
//        print_r($searchModel);
//        echo '<pre>';
        foreach ($models as $index => $model) {
            // populate and save records for each model
            if ($model->save()) {
                $count++;
            }
        }
        Yii::$app->session->setFlash('success', "Processed {$count} records successfully.");
        $this->redirect(Yii::$app->request->referrer);

        //        return $this->redirect(['index']); // redirect to your next desired page
    } else {
        $model = new BranchOfCompany();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'company' => $company,
            'model' => $model,
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

//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //iš gauto masyvų masyvo su visais formoje buvusiais duomenimis, imame tik to id masyvą
        if ($model->load(ArrayHelper::getColumn(Yii::$app->request->post(), $id))
            && $model->save() && $model->validate()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//            $atejoPostas = Yii::$app->request->post();
////            $atejoPostas = Yii::$app->request->post('BranchOfCompany');
//            echo'<pre>';
//            print_r($model);
//            echo'<pre> <br> atėjo postas: <br>';
//            print_r($atejoPostas);
//            echo'<br>perdirbtas get column:<br>';
//            print_r(ArrayHelper::getColumn($atejoPostas, $id));
//            echo'<br>dar:<br>';
//            print_r(Yii::$app->request->post('BranchOfCompany'));
//
//            echo'<br>dar karta:<br>';
//            print_r(Yii::$app->request->post('BranchOfCompany'));
//
//            echo'<br>atimtas:<br>';
////            print_r($atejoPostas - Yii::$app->request->post('BranchOfCompany'));
//
////            print_r(ArrayHelper::getValue($atejoPostas, $id));//nieko nerodo
//            echo'<pre>';die;
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
