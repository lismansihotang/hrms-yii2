<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BarangInventaris;

/**
 * BarangInventarisSearch represents the model behind the search form about `app\models\BarangInventaris`.
 */
class BarangInventarisSearch extends BarangInventaris
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_barang_inventaris'], 'integer'],
            [['nm_barang'], 'safe'],
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
        $query = BarangInventaris::find();

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
            'id_barang_inventaris' => $this->id_barang_inventaris,
        ]);

        $query->andFilterWhere(['like', 'nm_barang', $this->nm_barang]);

        return $dataProvider;
    }
}
