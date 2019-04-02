<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TipeAbsensi;

/**
 * TipeAbsensiSearch represents the model behind the search form about `app\models\TipeAbsensi`.
 */
class TipeAbsensiSearch extends TipeAbsensi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tipe_absensi'], 'integer'],
            [['nm_tipe_absensi'], 'safe'],
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
        $query = TipeAbsensi::find();

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
            'id_tipe_absensi' => $this->id_tipe_absensi,
        ]);

        $query->andFilterWhere(['like', 'nm_tipe_absensi', $this->nm_tipe_absensi]);

        return $dataProvider;
    }
}
