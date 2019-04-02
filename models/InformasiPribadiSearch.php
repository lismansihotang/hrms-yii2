<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\InformasiPribadi;

/**
 * InformasiPribadiSearch represents the model behind the search form about `app\models\InformasiPribadi`.
 */
class InformasiPribadiSearch extends InformasiPribadi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_info', 'id_karyawan'], 'integer'],
            [['nama', 'tmp_lahir', 'tgl_lahir', 'alamat', 'no_telp', 'email', 'jk', 'panggilan', 'status_menikah', 'status_rumah'], 'safe'],
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
        $query = InformasiPribadi::find();

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
            'id_info' => $this->id_info,
            'id_karyawan' => $this->id_karyawan,
            'tgl_lahir' => $this->tgl_lahir,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'tmp_lahir', $this->tmp_lahir])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'no_telp', $this->no_telp])
            ->andFilterWhere(['like', 'panggilan', $this->panggilan])
            ->andFilterWhere(['like', 'jk', $this->jk])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'status_menikah', $this->status_menikah])
            ->andFilterWhere(['like', 'status_rumah', $this->status_rumah]);

        return $dataProvider;
    }
}
