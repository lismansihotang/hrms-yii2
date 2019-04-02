<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PenggajianKomponen;

/**
 * PenggajianKomponenSearch represents the model behind the search form about `app\models\PenggajianKomponen`.
 */
class PenggajianKomponenSearch extends PenggajianKomponen
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_penggajian', 'id_komponen'], 'integer'],
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
        $query = PenggajianKomponen::find();

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
            'id' => $this->id,
            'id_penggajian' => $this->id_penggajian,
            'id_komponen' => $this->id_komponen,
        ]);

        return $dataProvider;
    }
}
