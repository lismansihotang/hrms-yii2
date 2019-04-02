<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\KaryawanDepartemen;

/**
 * KaryawanDepartemenSearch represents the model behind the search form about `app\models\KaryawanDepartemen`.
 */
class KaryawanDepartemenSearch extends KaryawanDepartemen
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_relasi', 'id_karyawan', 'id_dept'], 'integer'],
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
        $query = KaryawanDepartemen::find();

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
            'id_relasi' => $this->id_relasi,
            'id_karyawan' => $this->id_karyawan,
            'id_dept' => $this->id_dept,
        ]);

        return $dataProvider;
    }
}
