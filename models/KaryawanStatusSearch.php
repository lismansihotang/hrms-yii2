<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\KaryawanStatus;

/**
 * KaryawanStatusSearch represents the model behind the search form about `app\models\KaryawanStatus`.
 */
class KaryawanStatusSearch extends KaryawanStatus
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_status_karyawan', 'id_status', 'id_karyawan'], 'integer'],
            [['tgl_status', 'tgl_berlaku', 'tgl_berakhir'], 'safe'],
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
        $query = KaryawanStatus::find();

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
            'id_status_karyawan' => $this->id_status_karyawan,
            'id_status' => $this->id_status,
            'id_karyawan' => $this->id_karyawan,
            'tgl_status' => $this->tgl_status,
            'tgl_berlaku' => $this->tgl_berlaku,
            'tgl_berakhir' => $this->tgl_berakhir,
        ]);

        return $dataProvider;
    }
}
