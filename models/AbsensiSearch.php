<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Absensi;

/**
 * AbsensiSearch represents the model behind the search form about `app\models\Absensi`.
 */
class AbsensiSearch extends Absensi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_absensi', 'id_karyawan', 'id_shift', 'id_tipe_absensi'], 'integer'],
            [['tgl_absensi', 'jam_mulai', 'jam_berakhir'], 'safe'],
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
        $query = Absensi::find();

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
            'id_absensi' => $this->id_absensi,
            'id_karyawan' => $this->id_karyawan,
            'id_shift' => $this->id_shift,
            'tgl_absensi' => $this->tgl_absensi,
            'jam_mulai' => $this->jam_mulai,
            'jam_berakhir' => $this->jam_berakhir,
            'id_tipe_absensi' => $this->id_tipe_absensi,
        ]);

        return $dataProvider;
    }
}
