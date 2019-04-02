<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AbsensiSummary;

/**
 * AbsensiSummarySearch represents the model behind the search form about `app\models\AbsensiSummary`.
 */
class AbsensiSummarySearch extends AbsensiSummary
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_penggajian', 'id_karyawan', 'hadir', 'absen', 'cuti', 'sakit', 'ijin', 'lain'], 'integer'],
            [['tgl', 'bulan', 'tahun'], 'safe'],
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
        $query = AbsensiSummary::find();

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
            'id_karyawan' => $this->id_karyawan,
            'tgl' => $this->tgl,
            'hadir' => $this->hadir,
            'absen' => $this->absen,
            'cuti' => $this->cuti,
            'sakit' => $this->sakit,
            'ijin' => $this->ijin,
            'lain' => $this->lain,
        ]);

        $query->andFilterWhere(['like', 'bulan', $this->bulan])
            ->andFilterWhere(['like', 'tahun', $this->tahun]);

        return $dataProvider;
    }
}
