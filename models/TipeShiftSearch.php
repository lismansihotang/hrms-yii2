<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TipeShift;

/**
 * TipeShiftSearch represents the model behind the search form about `app\models\TipeShift`.
 */
class TipeShiftSearch extends TipeShift
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tipe_shift'], 'integer'],
            [['nm_shift'], 'safe'],
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
        $query = TipeShift::find();

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
            'id_tipe_shift' => $this->id_tipe_shift,
        ]);

        $query->andFilterWhere(['like', 'nm_shift', $this->nm_shift]);

        return $dataProvider;
    }
}
