<?php

namespace frontend\models;

use Yii;
use yii\web\Session;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\BranchOfCompany;

/**
 * BranchOfCompanySearch represents the model behind the search form about `frontend\models\BranchOfCompany`.
 */
class BranchOfCompanySearch extends BranchOfCompany
{
    public $parent_company_name;//papildomas laukas ne uš DB: paieškai iš susijusios parent_company lentelės pagal vardą
    public $from_date;//papildomas laukas ne uš DB: datos periodui
    public $to_date;//papildomas laukas ne uš DB: datos periodui
    public $flagShowUpdateForm;//papildomas laukas ne uš DB: datos periodui - is knopkes formos
    public $idFilterOfIndexView;//papildomas parametras ne uš DB: filtrui uzdeti, kai spaudziam index views lenteleje filtriuko zenkl
    private $session;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'parent_company_id', 'sort'], 'integer'],
            [['from_date', 'to_date'], 'datetime'],
//            [['flagShowUpdateForm'], 'integer'],
            [['date_foundation'],'date', 'format'=>'php:Y-m-d'],
            [['idFilterOfIndexView', 'name', 'email', 'isbn', 'date_foundation', 'alias', 'parent_company_name', 'flagShowUpdateForm'], 'safe'],
        ];
    }

    public function __construct($flagShowUpdateForm = false, $idFilterOfIndexView = null)
    {
        $session = Yii::$app->session;
        $this->session = $session;
        ($idFilterOfIndexView) ? $this->idFilterOfIndexView = $idFilterOfIndexView : null;
        //jei ateina iš formos flagas, tai pakeisk sesiją, kitaip - pasinaudok jau esama sesija
        if ($flagShowUpdateForm) {
//            $this->session->remove('flag_branch_update');// nebūtina trinti - su set pakeičia

            $this->session->set('flag_branch_update', $flagShowUpdateForm);//add new session
            $this->flagShowUpdateForm = $this->session->get('flag_branch_update');//to flag set new session

        } else {
            //flag is null - > if session exist -> to flag set old session, else flag set as usual (normall)
            $this->session->has('flag_branch_update')? $this->flagShowUpdateForm = $this->session->get('flag_branch_update') :
                $this->flagShowUpdateForm = $flagShowUpdateForm;
        }

//        print_r($this->session->get('flag_branch_update'));die;

    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        //paieškai susijusioje lentelėje parent_company, nustatome papildomą ryšį, remiantis jau esamu ryšiu
        // modelio BranchOfCompany.php imam ryšį getParentCompany(), tai bus parentCompany

        //buvo queris tik su filialais $query = BranchOfCompany::find();

        // add conditions that should always apply here
        /*-------paiaškinimas
| kad išvengti daugybinių užklausų, naudojamės modelių susiejimu (remiantis susietomis lentelėmis)
|   \frontend\models\BranchOfCompany.php modelis (lentelė branch_of_company ) susietas su modeliu
|    \frontend\models\ParentCompany.php (lentelė parent_company) ryšiu  parentCompany, kuris
| Yii2 pagalba išsišifruoja iš šio metodo, esančio modelyje BranchOfCompany:
|                public function getParentCompany()
|        {
|            return $this->hasOne(ParentCompany::className(), ['id' => 'parent_company_id']);
|        }
|
|   svarbu: parašymas ..find()->indexBy('id').. svarbus
|
|   eilutei (Model::loadMultiple($models, Yii::$app->request->post())
|   iš \frontend\controllers\BranchController.php metodo
| kuris atsakingas už visos eilutės įrašymą public function actionBatchUpdate($flagShowUpdateForm)
|
|   kadangi Kartik updeitinimas ir validacija galioja tik pirmam lentelės puslapiui, tai šaltinyje panaikiname paginaciją ir
|   tada automatiškai veikia limitas, kurį galime įrašyti į saito nustatymus
|
-------------*/
        //checking session -> if 2, then view is updatable table
        if(($this->session->has('flag_branch_update')) && ($this->session->get('flag_branch_update') == 2 )){
            //updeitinimo lentelė
//            $query = BranchOfCompany::find()->indexBy('id')->joinWith('parentCompany');
            $query = BranchOfCompany::find()->indexBy('id')->joinWith('parentCompany')->limit(10);
            if($this->idFilterOfIndexView){
                $this->id =$this->idFilterOfIndexView;
                $this->session['update_branch.id'] = $this->id;
            }
            $dataProvider = new ActiveDataProvider([
                'query' => $query,

                'pagination' => false,
                'sort' => [
                    'defaultOrder' => [
                        'sort' => SORT_ASC,
                    ],
                ],

            ]);
        }else{
            //index lentelei
            $query = BranchOfCompany::find()->indexBy('id')->joinWith('parentCompany');

            $dataProvider = new ActiveDataProvider([
                'query' => $query,
                'pagination' => [
                    'pageSize' => 6,
                ],
                'sort' => [
                    'defaultOrder' => [
                        'sort' => SORT_ASC,
                    ],
                ],

            ]);
        }
        //papildomas rūšiavimas pagal naują lauką ne iš DB, o rūšiuoja pvd susijusios lentelės jau iš DB
        $dataProvider->setSort([
            'attributes' => array_merge($dataProvider->getSort()->attributes, [
                'parent_company_name' => [
                    'asc' => ['parent_company.name' => SORT_ASC],
                    'desc' => ['parent_company.name' => SORT_DESC],
//                    'default' => SORT_ASC,
                    'label' => 'Parent company Name',
                ],
            ]),
            'defaultOrder' => [
                'sort' => SORT_ASC,//defaultinis rūšiavimas
            ],


        ]);

        $this->load($params);
//        print_r($this->flagShowUpdateForm);die;
        if (!$this->validate()) {
            // jei nevaliduojamas bent vienas paieškos laukas - iš karto grąžink šaltinį be paieškos
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');

            return $dataProvider;
        }


//     print_r('this id: ' . $this->id . '<br>');//die;

        /*kai uzdedame filtra (lenteles galvoje), tai atskrenda dviejų tipų parametrai - tie, kurie yra extendinėje lentelėje
        |pvz, kaip $this->name ir tie, kurie mus sugalvoti ir parašyti, pvz $this->parent_company_name;, kurie turi būti validuojami
        |esmė - kai vykdoma paieška - tai atskrenda kažkokie parametrai, jei tik paleidžiamas lentelinis vaizdas- tie visi
        |/parametrai būna nuliniai ir šaltiniui sudaryti pateikiamas queris be parametrų - užrašas $query-> ignoruojamas
        |ir grąžinama tik return $dataProvider;
        |----------------------------------------------------
        |   Pastaba: sios formos konstruktoriuje isimename-uzfiksuojame flago reiksmes sesijoje, kad zinotume, kur esame - ar index
        | lenteleje (flagShowUpdateForm = 1) ar koreguojamoje lenteleje (flagShowUpdateForm = 2)
        |   isiminimo esme - jei i konstruktoriu ateina flagShowUpdateForm ne null reiksme, tai ja isimink sesijoje,
        |   o jei ateina flagShowUpdateForm null, kas reiskia, kad nebuvo spausta nei rodyk updeitinimo lentele, t.y.
        |   nespausta nei viena knopke, kuri gali buti be formos:
        |                    Html::a('<i class="glyphicon glyphicon-edit"></i>&nbsp;View editable',
        |                ['index',
        |                    'flagShowUpdateForm' => 2,
        |                ],
        |                ['class' => 'btn btn-default',
        |                    'id' => 'btnShowUpdate',
        |                    'data' => [
        |                        'method' => 'post',
        |                    ],
        |                ]),
        |   tokiu atveju, formos lauka $this->flagShowUpdateForm atgaminame is sesijos - ir pastoviai zinome, kur esame
        |
        |kad galėtume šiuos paieškos parametrus (gautus iš GridView ) panaudoti ir Kartik Widgets'ui  TabularForm::widget([
        |turime juos kažkaip užfiksuoti sesijoje.
        |Pradžioje, konstruktoriuje įsimename flagShowUpdateForm sesiją  - kad žinotume kokioje vietoje esame - ar index
        |lentelėje (flagShowUpdateForm=1: atsiranda, kai koreguojamoje lenteleje paspaudziam rodyti rezultata - index lentele
        | arba flagShowUpdateForm=2: kas reiskia, kad index lenteleje paspausta eiti i koreguojama lentele
        | sios lenteles skiriasi - viena su Kartik GridView widgetsu - tik perziurai - turi gerus paieskos filtrus-laukus
        | kita yra su TabularForm widgetsu - neturi paieskos lauku, bet gali bazuotis ant tos pacios bazes, kaip ir GridView
        | todel patogu palikti GridView filtrus-parametrus, issaugotus sesijose. Sioje Kartik koreguojamoje lenteleje
        | labai patogu koreguoti irasus tiek po viena, tiek visus is karto ir, svarbu, veikia ActivForm'os validacija
        | Taigi, kad galetume koreguojamoje lenteleje pasinaudoti index lenteleje gautais filtrais - juos reikia uzfiksuoti.
        |Užfiksavimo esmė:
        |
        |1. tikriname ar index lenteleje paspausta eiti i koreguojama lentele. $this->session->get('flag_branch_update') == 2
        |   a) Taip -> patikriname ar yra parametru sesijos (kiekvieno, paieskoje dalyvaujancio parametro) - jei yra -
        |     parametrui suteikiame ta parametro sesija (pagal siuos parametrus bus atrinktas saltinis)
        |       (ir taip kiekvienam parametrui)
        |   b) Ne -> vadinasi esame ne koreguojamoje lenteleje, o index lenteleje. Cia galimi keli variantai - ar atejo
        |       naujas parametras - jei naujas - tvarkoje - perrasom sesija ir ji isimename, jei ne - tikriname atveji
        |       kad tik ka atejome is koreguojamos lenteles ir mums reikia, kad index lentele atvaizduotu senais parametrais
        |       t.y. pakoregave griztame i ta pacia atrinkta index lentele. Jei atejome ne is koreguojamos - sesija naikiname.
        |       Ir taip tikriname visus, paieskoje dalyvaujancius parametrus.
        |
        |       1) esame index lenteleje ir atejo parametras -> isimink sesija naujo parametro.
        |
        |           Svarbu: parametrus isimename sesijomis, kad paskui veliau galetume atgaminti - grazindami parametrams
        |                   sesijas, ir tuo paciu views'e, ji atnaujinus, formos paieskos lauke butu tas parametras
        |       2) parametras nulinis (esame index lenteleje) - tikriname ar atejome is koreguojamos lenteles
        |            (t.y. ar $this->session->get('flag_branch_update') == 1)
        |           a) Taip (atejome is koreguojamos lenteles arba index lenteleje spaudinejami kiti parametrai, bet nelieciama
        |               refrech knopke - ji panaikina visus filtrus ir flagus) -> parametrui suteikiame sesija, jei ji yra
        |
        |           b) Ne (index lenteleje paspausta refrech knopke, arba atejome pirma karta i index lentele)
        |               panaikiname sio parametro sesija.
        |           Pastaba: ir taip kiekvienam, paieskoje dalyvaujanciam parametrui
        |
        |   b) punkto pabaigoje panaikiname flago sesija, jei tokia yra, nes priesingu atveju, konstruktoriuje si flaga
        |      sesiju pagalba
        |        $this->session->has('flag_branch_update')? $this->flagShowUpdateForm = $this->session->get('flag_branch_update')
        |       atgamina ir tada refrechinimas flago nepanaikina ir mes atsiduriame tokioje padetyje, kai flagas yra 1, o parametras
        |       null ir tada ta parametra atgamina is sesijos: variantas  1.->b)->2)->a)
        |
        |
        */



        /*=================session parameter======================*/
        if ($this->session->has('flag_branch_update') && $this->session->get('flag_branch_update') == 2){

            //in the index table pressed view to update table
            //set id parameter
            if ($this->session->has('update_branch.id')) {
                $this->id = $this->session['update_branch.id'];//to set new session
            }
            //set parent_company_id parameter
            if ($this->session->has('update_branch.parent_company_id')) {
                $this->parent_company_id = $this->session['update_branch.parent_company_id'];//to set new session
            }
            //set name parameter
            if ($this->session->has('update_branch.name')) {
                $this->name = $this->session['update_branch.name'];//to set new session
            }
            //set isbn parameter
            if ($this->session->has('update_branch.isbn')) {
                $this->isbn = $this->session['update_branch.isbn'];//to set new session
            }
            //set alias parameter
            if ($this->session->has('update_branch.alias')) {
                $this->alias = $this->session['update_branch.alias'];//to set new session
            }
            //set multiple parameter: parent name name alias
            if ($this->session->has('update_branch.parent_company_name')) {
                $this->parent_company_name = $this->session['update_branch.parent_company_name'];//to set new session
            }

        }else{
            //other variants:

            /*--------- for id parameter----------------*/
            if ($this->id) {//parameter not null - set new session and pass it to parameter
                $this->session['update_branch.id'] = $this->id;//to set new session
            }else{//parameter is null - look
                if ($this->session->has('flag_branch_update') && $this->session->get('flag_branch_update') ==1){
                    //in the update table pressed view result to index table - set old session to parameter
                    if ($this->session->has('update_branch.id')) {
                        $this->id = $this->session['update_branch.id'];//to set new session
                    }
                }else{//in index table pressed another parameter - delete session this parameter because parameter $this->name is empty
                    $this->session->has('update_branch.id') ? $this->session->remove('update_branch.id') : null;
                }

            }
            /*---------end for id parameter----------------*/

            /*--------- for parent_company_name parameter----------------*/
            if ($this->parent_company_name) {//parameter not null - set new session and pass it to parameter
                $this->session['update_branch.parent_company_name'] = $this->parent_company_name;//to set new session
            }else{//parameter is null - look
                if ($this->session->has('flag_branch_update') && $this->session->get('flag_branch_update') ==1){
                    //in the update table pressed view result to index table - set old session to parameter
                    if ($this->session->has('update_branch.parent_company_name')) {
                        $this->parent_company_name = $this->session['update_branch.parent_company_name'];//to set new session
                    }
                }else{//in index table pressed another parameter - delete session this parameter because parameter $this->name is empty
                    $this->session->has('update_branch.parent_company_name') ? $this->session->remove('update_branch.parent_company_name') : null;
                }

            }
            /*---------end for parent_company_name parameter----------------*/

            /*--------- for parent_company_id parameter----------------*/
            if ($this->parent_company_id) {//parameter not null - set new session and pass it to parameter
                $this->session['update_branch.parent_company_id'] = $this->parent_company_id;//to set new session
            }else{//parameter is null - look
                if ($this->session->has('flag_branch_update') && $this->session->get('flag_branch_update') == 1){
                    //in the update table pressed view result to index table - set old session to parameter
                    if ($this->session->has('update_branch.parent_company_id')) {
                        $this->parent_company_id = $this->session['update_branch.parent_company_id'];//to set new session
                    }
                }else{//in index table pressed another parameter - delete session this parameter because parameter $this->name is empty
                    $this->session->has('update_branch.parent_company_id') ? $this->session->remove('update_branch.parent_company_id') : null;
                }

            }
            /*---------end for parent_company_id parameter----------------*/

            /*--------- for name parameter----------------*/
            if ($this->name) {//parameter not null - set new session and pass it to parameter
                $this->session['update_branch.name'] = $this->name;//to set new session
            }else{//parameter is null - look
                if ($this->session->has('flag_branch_update') && $this->session->get('flag_branch_update') == 1){
                    //in the update table pressed view result to index table - set old session to parameter
                    if ($this->session->has('update_branch.name')) {
                        $this->name = $this->session['update_branch.name'];//to set new session
                    }
                }else{//in index table pressed another parameter - delete session this parameter because parameter $this->name is empty
                    $this->session->has('update_branch.name') ? $this->session->remove('update_branch.name') : null;
                }

            }
            /*---------end for name parameter----------------*/

            /*--------- for alias parameter----------------*/
            if ($this->alias) {//parameter not null - set new session and pass it to parameter
                $this->session['update_branch.alias'] = $this->alias;//to set new session
            }else{//parameter is null - look
                if ($this->session->has('flag_branch_update') && $this->session->get('flag_branch_update') == 1){
                    //in the update table pressed view result to index table - set old session to parameter
                    if ($this->session->has('update_branch.alias')) {
                        $this->alias = $this->session['update_branch.alias'];//to set new session
                    }
                }else{//in index table pressed another parameter - delete session this parameter because parameter $this->name is empty
                    $this->session->has('update_branch.alias') ? $this->session->remove('update_branch.alias') : null;
                }

            }
            /*---------end for alias parameter----------------*/

            /*--------- for isbn parameter----------------*/
            if ($this->isbn) {//parameter not null - set new session and pass it to parameter
                $this->session['update_branch.isbn'] = $this->isbn;//to set new session
            }else{//parameter is null - look
                if ($this->session->has('flag_branch_update') && $this->session->get('flag_branch_update') == 1){
                    //in the update table pressed view result to index table - set old session to parameter
                    if ($this->session->has('update_branch.isbn')) {
                        $this->isbn = $this->session['update_branch.isbn'];//to set new session
                    }
                }else{//in index table pressed another parameter - delete session this parameter because parameter $this->name is empty
                    $this->session->has('update_branch.isbn') ? $this->session->remove('update_branch.isbn') : null;
                }

            }
            /*---------end for name parameter----------------*/

            //after all parameter checking - delete flag session ()
            $this->session->has('flag_branch_update') ? $this->session->remove('flag_branch_update'):  null;
        }

        /*================session parameter end ======================*/






        // grid filtering conditions
        $query->andFilterWhere([
            'branch_of_company.id' => $this->id,
            'branch_of_company.parent_company_id' => $this->parent_company_id,
            'branch_of_company.sort' => $this->sort,
        ]);
        $query->andFilterWhere(['like', 'branch_of_company.name', $this->parent_company_name])
            ->orFilterWhere(['like', 'parent_company.name', $this->parent_company_name])
            ->orFilterWhere(['like', 'branch_of_company.alias', $this->parent_company_name])
            ->andFilterWhere(['like', 'branch_of_company.alias', $this->alias])
            ->andFilterWhere(['like', 'branch_of_company.isbn', $this->isbn])
            ->andFilterWhere(['like', 'branch_of_company.name', $this->name])
//            ->andFilterWhere(['like', 'branch_of_company.name', 'factor'])
//            ->andFilterWhere(['like', 'branch_of_company.email', $this->email])
            ->andFilterWhere(['like', 'branch_of_company.date_foundation', $this->date_foundation]);
//            ->andFilterWhere(['like', 'branch_of_company.isbn', $this->isbn])
//            ->andFilterWhere(['like', 'branch_of_company.alias', $this->alias])
//            ->andFilterWhere(['like', 'parent_company.name', $this->parent_company_name]);
//veikia        $query->andFilterWhere(['like', 'branch_of_company.name', $this->name])
//            ->andFilterWhere(['like', 'branch_of_company.email', $this->email])
//            ->andFilterWhere(['like', 'branch_of_company.isbn', $this->isbn])
//            ->andFilterWhere(['like', 'branch_of_company.alias', $this->alias])
//            ->andFilterWhere(['like', 'parent_company.name', $this->parent_company_name]);
        //paskutinė eilutė paieška iš susijusios lentelės lauko, šiuo atveju iš pavadinimo
        //kad galima būt uždėt datos laukui filtrą vienos dienos
        /*----------kai lentelės laukas date_foundation formato date---------*/
//            if(!empty($this->date_foundation))
//                $query->andFilterWhere(['like','date_foundation',$this->date_foundation]);
        /*----------kai lentelės laukas date_foundation formato integer - tai TIMESTAMP---------*/
        if(!empty($this->from_date) and !empty($this->to_date))
            $query->andFilterWhere(['and', ['>', 'branch_of_company.date_foundation', $this->from_date], ['<', 'branch_of_company.date_foundation', $this->to_date]]);
//            print_r($this->name);die;

        return $dataProvider;
    }
}
