<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PenggajianKaryawanDetail;

/**
 * PenggajianKaryawanDetailSearch represents the model behind the search form about `app\models\PenggajianKaryawanDetail`.
 */
class PenggajianKaryawanDetailSearch extends PenggajianKaryawanDetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pkd', 'id_pk', 'id_komponen', 'jumlah'], 'integer'],
            [['nominal', 'subtotal'], 'number'],
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
        $query = PenggajianKaryawanDetail::find();

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
            'id_pkd' => $this->id_pkd,
            'id_pk' => $this->id_pk,
            'id_komponen' => $this->id_komponen,
            'jumlah' => $this->jumlah,
            'nominal' => $this->nominal,
            'subtotal' => $this->subtotal,
        ]);

        return $dataProvider;
    }
}
