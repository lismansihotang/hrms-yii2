<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\KaryawanAbsensi;

/**
 * KaryawanAbsensiSearch represents the model behind the search form about `app\models\KaryawanAbsensi`.
 */
class KaryawanAbsensiSearch extends KaryawanAbsensi {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id_karyawan_absensi'], 'integer'],
            [['tgl_absensi', 'id_karyawan', 'id_tipe_absensi'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
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
    public function search($params) {
        $query = KaryawanAbsensi::find();

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
        $query->joinWith('karyawan');
        $query->joinWith('tipeAbsensi');
        // grid filtering conditions
        $query->andFilterWhere([
            'id_karyawan_absensi' => $this->id_karyawan_absensi,
            'tgl_absensi' => $this->tgl_absensi,
        ]);
        $query->andFilterWhere(['like', 'informasi_pribadi.nama', $this->id_karyawan])
                ->andFilterWhere(['like', 'tipe_absensi.nm_tipe_absensi', $this->id_tipe_absensi]);

        return $dataProvider;
    }

}
