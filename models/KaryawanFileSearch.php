<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\KaryawanFile;

/**
 * KaryawanFileSearch represents the model behind the search form about `app\models\KaryawanFile`.
 */
class KaryawanFileSearch extends KaryawanFile
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_file', 'id_karyawan'], 'integer'],
            [['nm_file', 'is_active'], 'safe'],
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
        $query = KaryawanFile::find();

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
            'id_file' => $this->id_file,
            'id_karyawan' => $this->id_karyawan,
        ]);

        $query->andFilterWhere(['like', 'nm_file', $this->nm_file])
            ->andFilterWhere(['like', 'is_active', $this->is_active]);

        return $dataProvider;
    }
}
