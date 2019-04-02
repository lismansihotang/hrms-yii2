<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\QuotaCuti;

/**
 * QuotaCutiSearch represents the model behind the search form about `app\models\QuotaCuti`.
 */
class QuotaCutiSearch extends QuotaCuti
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_quota', 'jml'], 'integer'],
            [['tahun'], 'safe'],
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
        $query = QuotaCuti::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_quota' => $this->id_quota,
            'jml' => $this->jml,
        ]);

        $query->andFilterWhere(['like', 'tahun', $this->tahun]);

        return $dataProvider;
    }
}
