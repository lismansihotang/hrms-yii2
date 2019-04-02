<?php
namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\KaryawanFingerId;

/**
 * KaryawanFingerIdSearch represents the model behind the search form about `app\models\KaryawanFingerId`.
 */
class KaryawanFingerIdSearch extends KaryawanFingerId
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_kfi'], 'integer'],
            [['log_finger_id', 'id_karyawan'], 'safe'],
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
        $query = KaryawanFingerId::find();
        // add conditions that should always apply here
        $dataProvider = new ActiveDataProvider(
            [
                'query' => $query,
            ]
        );
        $this->load($params);
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $query->joinWith('informasiPribadi');
        // grid filtering conditions
        $query->andFilterWhere(
            [
                'id_kfi' => $this->id_kfi,
            ]
        );
        $query->andFilterWhere(['like', 'log_finger_id', $this->log_finger_id])->andFilterWhere(
            ['like', 'informasi_pribadi.nama', $this->id_karyawan]
        );
        return $dataProvider;
    }
}
