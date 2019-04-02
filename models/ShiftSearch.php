<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Shift;

/**
 * ShiftSearch represents the model behind the search form about `app\models\Shift`.
 */
class ShiftSearch extends Shift
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_shift', 'id_karyawan', 'id_tipe_shift'], 'integer'],
            [['jam_mulai', 'jam_berakhir'], 'safe'],
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
        $query = Shift::find();

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
            'id_shift' => $this->id_shift,
            'id_karyawan' => $this->id_karyawan,
            'id_tipe_shift' => $this->id_tipe_shift,
            'jam_mulai' => $this->jam_mulai,
            'jam_berakhir' => $this->jam_berakhir,
        ]);

        return $dataProvider;
    }
}
