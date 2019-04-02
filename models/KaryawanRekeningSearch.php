<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\KaryawanRekening;

/**
 * KaryawanRekeningSearch represents the model behind the search form about `app\models\KaryawanRekening`.
 */
class KaryawanRekeningSearch extends KaryawanRekening
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_rekening', 'id_karyawan', 'id_bank'], 'integer'],
            [['no_rek', 'nm_pemilik_rek'], 'safe'],
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
        $query = KaryawanRekening::find();

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
            'id_rekening' => $this->id_rekening,
            'id_karyawan' => $this->id_karyawan,
            'id_bank' => $this->id_bank,
        ]);

        $query->andFilterWhere(['like', 'no_rek', $this->no_rek])
            ->andFilterWhere(['like', 'nm_pemilik_rek', $this->nm_pemilik_rek]);

        return $dataProvider;
    }
}
