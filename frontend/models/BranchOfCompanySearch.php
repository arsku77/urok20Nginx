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
    private $session;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'parent_company_id', 'sort'], 'integer'],
            [['from_date', 'to_date'], 'datetime'],
            [['name', 'email', 'isbn', 'date_foundation', 'alias', 'parent_company_name', 'flagShowUpdateForm'], 'safe'],
        ];
    }

    public function __construct($flagShowUpdateForm = false)
    {
        $session = Yii::$app->session;
        $this->session = $session;
        //jei ateina iš formos flagas, tai pakeisk sesiją, kitaip - pasinaudoka jau esama sesija
        if ($flagShowUpdateForm) {
            $this->session->remove('flag_exist');

            $this->session->set('flag_exist', $flagShowUpdateForm);


            $this->flagShowUpdateForm = $this->session->get('flag_exist');
//            print_r($flagShowUpdateForm);die;

        } else {
            $this->session->has('flag_exist')? $this->flagShowUpdateForm = $this->session->get('flag_exist') :
            $this->flagShowUpdateForm = $flagShowUpdateForm;
        }

//        print_r($this->session->get('flag_exist'));die;

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
        $query = BranchOfCompany::find()->joinWith('parentCompany');

        // add conditions that should always apply here

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
        |
        |kad galėtume šiuos paieškos parametrus (gautus iš GridView )panaudoti ir Kartik Widgets'ui  TabularForm::widget([
        |turime juos kažkaip užfiksuoti sesijoje.
        |Užfiksavimo esmė: patikriname ar atėjo bent koks paieškoje dalyvaujantis parametras
        |jei atėjo nunuliname visas sesijas ir iš naujo įsimename naujas sesijas
        |jei neatėjo parametrų ir updeitinimo lentelės flago nera - vadinasi norima tik šaltinio,
        |tai ištriname visas sesijas jį ir pateikiame return $dataProvider; -> rodyk abi lenteles su pilnu šaltiniu
        |jei neatėjo parametrų ir updeitinimo lentelės flagas yra - vadinasi norima updeitinimo lentelės su paskutiniais paieškos
        |parametrais, tai praleidžiame tas sesijas (gautas iš parametrų) per filtrą -> rodyk abi lenteles su atrinktu šaltiniu
        |
        */
//print_r($this->flagShowUpdateForm); die;


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
