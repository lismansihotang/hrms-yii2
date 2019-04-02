<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RiwayatPendidikan;

/**
 * RiwayatPendidikanSearch represents the model behind the search form about `app\models\RiwayatPendidikan`.
 */
class RiwayatPendidikanSearch extends RiwayatPendidikan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_rp', 'id_karyawan', 'id_pendidikan', 'id_tmpt_pendidikan'], 'integer'],
            [['thn_lulus'], 'safe'],
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
        $query = RiwayatPendidikan::find();

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
            'id_rp' => $this->id_rp,
            'id_karyawan' => $this->id_karyawan,
            'id_pendidikan' => $this->id_pendidikan,
            'id_tmpt_pendidikan' => $this->id_tmpt_pendidikan,
        ]);

        $query->andFilterWhere(['like', 'thn_lulus', $this->thn_lulus]);

        return $dataProvider;
    }
}
