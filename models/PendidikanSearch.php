<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pendidikan;

/**
 * PendidikanSearch represents the model behind the search form about `app\models\Pendidikan`.
 */
class PendidikanSearch extends Pendidikan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pendidikan'], 'integer'],
            [['nm_pendidikan', 'deskripsi'], 'safe'],
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
        $query = Pendidikan::find();

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
            'id_pendidikan' => $this->id_pendidikan,
        ]);

        $query->andFilterWhere(['like', 'nm_pendidikan', $this->nm_pendidikan])
            ->andFilterWhere(['like', 'deskripsi', $this->deskripsi]);

        return $dataProvider;
    }
}
