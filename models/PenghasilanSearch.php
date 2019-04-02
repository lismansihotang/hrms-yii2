<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Penghasilan;

/**
 * PenghasilanSearch represents the model behind the search form about `app\models\Penghasilan`.
 */
class PenghasilanSearch extends Penghasilan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_penghasilan'], 'integer'],
            [['range_penghasilan'], 'safe'],
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
        $query = Penghasilan::find();

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
            'id_penghasilan' => $this->id_penghasilan,
        ]);

        $query->andFilterWhere(['like', 'range_penghasilan', $this->range_penghasilan]);

        return $dataProvider;
    }
}
