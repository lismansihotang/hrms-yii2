<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\KaryawanSanksi;

/**
 * KaryawanSanksiSearch represents the model behind the search form about `app\models\KaryawanSanksi`.
 */
class KaryawanSanksiSearch extends KaryawanSanksi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_sanksi', 'id_karyawan', 'id_jenis_sanksi'], 'integer'],
            [['tgl_sanksi', 'tgl_berlaku', 'tgl_berakhir'], 'safe'],
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
        $query = KaryawanSanksi::find();

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
            'id_sanksi' => $this->id_sanksi,
            'id_karyawan' => $this->id_karyawan,
            'id_jenis_sanksi' => $this->id_jenis_sanksi,
            'tgl_sanksi' => $this->tgl_sanksi,
            'tgl_berlaku' => $this->tgl_berlaku,
            'tgl_berakhir' => $this->tgl_berakhir,
        ]);

        return $dataProvider;
    }
}
