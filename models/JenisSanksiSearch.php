<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\JenisSanksi;

/**
 * JenisSanksiSearch represents the model behind the search form about `app\models\JenisSanksi`.
 */
class JenisSanksiSearch extends JenisSanksi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_jenis_sanksi'], 'integer'],
            [['nm_jenis_sanksi'], 'safe'],
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
        $query = JenisSanksi::find();

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
            'id_jenis_sanksi' => $this->id_jenis_sanksi,
        ]);

        $query->andFilterWhere(['like', 'nm_jenis_sanksi', $this->nm_jenis_sanksi]);

        return $dataProvider;
    }
}
