<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\KaryawanInventaris;

/**
 * KaryawanInventarisSearch represents the model behind the search form about `app\models\KaryawanInventaris`.
 */
class KaryawanInventarisSearch extends KaryawanInventaris
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_inventaris', 'id_karyawan', 'id_barang_inventaris', 'jml'], 'integer'],
            [['tgl_inventaris', 'tgl_terima', 'tgl_kembali', 'ket'], 'safe'],
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
        $query = KaryawanInventaris::find();

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
            'id_inventaris' => $this->id_inventaris,
            'id_karyawan' => $this->id_karyawan,
            'tgl_inventaris' => $this->tgl_inventaris,
            'tgl_terima' => $this->tgl_terima,
            'tgl_kembali' => $this->tgl_kembali,
            'id_barang_inventaris' => $this->id_barang_inventaris,
            'jml' => $this->jml,
        ]);

        $query->andFilterWhere(['like', 'ket', $this->ket]);

        return $dataProvider;
    }
}
