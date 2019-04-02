<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Departemen;

/**
 * DepartemenSearch represents the model behind the search form about `app\models\Departemen`.
 */
class DepartemenSearch extends Departemen
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_dept', 'id_perusahaan'], 'integer'],
            [['singkatan', 'nm_dept'], 'safe'],
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
        $query = Departemen::find();

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
            'id_dept' => $this->id_dept,
            'id_perusahaan' => $this->id_perusahaan,
        ]);

        $query->andFilterWhere(['like', 'singkatan', $this->singkatan])
            ->andFilterWhere(['like', 'nm_dept', $this->nm_dept]);

        return $dataProvider;
    }
}
