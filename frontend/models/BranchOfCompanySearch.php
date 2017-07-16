<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\BranchOfCompany;

/**
 * BranchOfCompanySearch represents the model behind the search form about `frontend\models\BranchOfCompany`.
 */
class BranchOfCompanySearch extends BranchOfCompany
{
    public $parent_company_name;//papildomas laukas ne uš DB: paieškai iš susijusios parent_company lentelės pagal vardą
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'parent_company_id', 'sort'], 'integer'],
            [['parent_company_name'], 'string'],
            [['name', 'email', 'isbn', 'date_foundation', 'alias', 'parent_company_name'], 'safe'],
        ];
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
                'pageSize' => 5,
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

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'parent_company_id' => $this->parent_company_id,
            'date_foundation' => $this->date_foundation,
            'sort' => $this->sort,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'isbn', $this->isbn])
            ->andFilterWhere(['like', 'alias', $this->alias])
            ->andFilterWhere(['like', 'parent_company.name', $this->parent_company_name]);
            //paskutinė eilutė paieška iš susijusios lentelės lauko, šiuo atveju iš pavadinimo
        return $dataProvider;
    }
}
