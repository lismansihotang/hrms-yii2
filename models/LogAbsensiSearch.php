<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LogAbsensi;

/**
 * LogAbsensiSearch represents the model behind the search form about `app\models\LogAbsensi`.
 */
class LogAbsensiSearch extends LogAbsensi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'log_match_id', 'log_type'], 'integer'],
            [['log_finger_id', 'log_fulldate', 'log_date', 'log_time'], 'safe'],
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
        $query = LogAbsensi::find();

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
        $query->joinWith('karyawan');
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'log_match_id' => $this->log_match_id,
            'log_fulldate' => $this->log_fulldate,
            'log_type' => $this->log_type,
            'log_date' => $this->log_date,
            'log_time' => $this->log_time,
        ]);

        $query->andFilterWhere(['like', 'v_karyawan_finger.nama', $this->log_finger_id]);

        return $dataProvider;
    }
}
