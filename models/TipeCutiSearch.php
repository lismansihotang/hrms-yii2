<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TipeCuti;

/**
 * TipeCutiSearch represents the model behind the search form about `app\models\TipeCuti`.
 */
class TipeCutiSearch extends TipeCuti
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tipe_cuti', 'jatah_cuti'], 'integer'],
            [['nm_tipe_cuti'], 'safe'],
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
        $query = TipeCuti::find();

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
            'id_tipe_cuti' => $this->id_tipe_cuti,
            'jatah_cuti' => $this->jatah_cuti,
        ]);

        $query->andFilterWhere(['like', 'nm_tipe_cuti', $this->nm_tipe_cuti]);

        return $dataProvider;
    }
}
