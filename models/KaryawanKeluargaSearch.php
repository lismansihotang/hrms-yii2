<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\KaryawanKeluarga;

/**
 * KaryawanKeluargaSearch represents the model behind the search form about `app\models\KaryawanKeluarga`.
 */
class KaryawanKeluargaSearch extends KaryawanKeluarga
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_keluarga', 'id_karyawan', 'id_hub_keluarga', 'id_pendidikan', 'id_pekerjaan', 'id_penghasilan'], 'integer'],
            [['nama', 'tgl_lahir', 'tmp_lahir', 'jk', 'alamat', 'no_telp', 'email'], 'safe'],
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
        $query = KaryawanKeluarga::find();

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
            'id_keluarga' => $this->id_keluarga,
            'id_karyawan' => $this->id_karyawan,
            'id_hub_keluarga' => $this->id_hub_keluarga,
            'tgl_lahir' => $this->tgl_lahir,
            'id_pendidikan' => $this->id_pendidikan,
            'id_pekerjaan' => $this->id_pekerjaan,
            'id_penghasilan' => $this->id_penghasilan,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'tmp_lahir', $this->tmp_lahir])
            ->andFilterWhere(['like', 'jk', $this->jk])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'no_telp', $this->no_telp])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
