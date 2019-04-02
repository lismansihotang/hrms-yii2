<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\KalenderLibur;

/**
 * KalenderLiburSearch represents the model behind the search form about `app\models\KalenderLibur`.
 */
class KalenderLiburSearch extends KalenderLibur
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_kalender_libur'], 'integer'],
            [['thn_libur', 'tgl_libur'], 'safe'],
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
        $query = KalenderLibur::find();

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
            'id_kalender_libur' => $this->id_kalender_libur,
            'tgl_libur' => $this->tgl_libur,
        ]);

        $query->andFilterWhere(['like', 'thn_libur', $this->thn_libur]);

        return $dataProvider;
    }
}
