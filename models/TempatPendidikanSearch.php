<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TempatPendidikan;

/**
 * TempatPendidikanSearch represents the model behind the search form about `app\models\TempatPendidikan`.
 */
class TempatPendidikanSearch extends TempatPendidikan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tp'], 'integer'],
            [['nm_tmpt', 'alamat', 'no_telp', 'no_fax', 'email'], 'safe'],
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
        $query = TempatPendidikan::find();

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
            'id_tp' => $this->id_tp,
        ]);

        $query->andFilterWhere(['like', 'nm_tmpt', $this->nm_tmpt])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'no_telp', $this->no_telp])
            ->andFilterWhere(['like', 'no_fax', $this->no_fax])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
