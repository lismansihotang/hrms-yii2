<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PenggajianKaryawan;

/**
 * PenggajianKaryawanSearch represents the model behind the search form about `app\models\PenggajianKaryawan`.
 */
class PenggajianKaryawanSearch extends PenggajianKaryawan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pk', 'id_penggajian', 'id_karyawan'], 'integer'],
            [['pendapatan', 'potongan'], 'number'],
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
        $query = PenggajianKaryawan::find();

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
            'id_pk' => $this->id_pk,
            'id_penggajian' => $this->id_penggajian,
            'id_karyawan' => $this->id_karyawan,
            'pendapatan' => $this->pendapatan,
            'potongan' => $this->potongan,
        ]);

        return $dataProvider;
    }
}
