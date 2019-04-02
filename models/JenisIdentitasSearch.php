<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\JenisIdentitas;

/**
 * JenisIdentitasSearch represents the model behind the search form about `app\models\JenisIdentitas`.
 */
class JenisIdentitasSearch extends JenisIdentitas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_jenis_identitas'], 'integer'],
            [['nm_jenis_identitas'], 'safe'],
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
        $query = JenisIdentitas::find();

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
            'id_jenis_identitas' => $this->id_jenis_identitas,
        ]);

        $query->andFilterWhere(['like', 'nm_jenis_identitas', $this->nm_jenis_identitas]);

        return $dataProvider;
    }
}
