<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\HubunganKeluarga;

/**
 * HubunganKeluargaSearch represents the model behind the search form about `app\models\HubunganKeluarga`.
 */
class HubunganKeluargaSearch extends HubunganKeluarga
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_hub_keluarga'], 'integer'],
            [['nm_hub_keluarga'], 'safe'],
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
        $query = HubunganKeluarga::find();

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
            'id_hub_keluarga' => $this->id_hub_keluarga,
        ]);

        $query->andFilterWhere(['like', 'nm_hub_keluarga', $this->nm_hub_keluarga]);

        return $dataProvider;
    }
}
