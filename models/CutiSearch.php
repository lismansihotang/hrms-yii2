<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cuti;

/**
 * CutiSearch represents the model behind the search form about `app\models\Cuti`.
 */
class CutiSearch extends Cuti
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_cuti', 'id_karyawan', 'id_tipe_cuti'], 'integer'],
            [['tgl_mulai_cuti', 'tgl_berakhir_cuti'], 'safe'],
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
        $query = Cuti::find();

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
            'id_cuti' => $this->id_cuti,
            'id_karyawan' => $this->id_karyawan,
            'id_tipe_cuti' => $this->id_tipe_cuti,
            'tgl_mulai_cuti' => $this->tgl_mulai_cuti,
            'tgl_berakhir_cuti' => $this->tgl_berakhir_cuti,
        ]);

        return $dataProvider;
    }
}
