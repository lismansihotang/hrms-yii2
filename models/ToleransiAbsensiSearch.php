<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ToleransiAbsensi;

/**
 * ToleransiAbsensiSearch represents the model behind the search form about `app\models\ToleransiAbsensi`.
 */
class ToleransiAbsensiSearch extends ToleransiAbsensi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tolernasi', 'jml'], 'integer'],
            [['tahun', 'id_tipe_absensi'], 'safe'],
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
        $query = ToleransiAbsensi::find();

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

		$query->joinWith('tipeAbsensi');
        // grid filtering conditions
        $query->andFilterWhere([
            'id_tolernasi' => $this->id_tolernasi,
            'jml' => $this->jml,
        ]);

        $query->andFilterWhere(['like', 'tahun', $this->tahun])
        ->andFilterWhere(['like', 'tipe_absensi.nm_tipe_absensi', $this->id_tipe_absensi]);

        return $dataProvider;
    }
}
