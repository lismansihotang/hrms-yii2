<?php
namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\KaryawanAtasan;

/**
 * KaryawanAtasanSearch represents the model behind the search form about `app\models\KaryawanAtasan`.
 */
class KaryawanAtasanSearch extends KaryawanAtasan
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_atasan'], 'integer'],
            [['id_karyawan_atasan', 'id_karyawan'], 'string']
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
        $query = KaryawanAtasan::find();
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
        // grid filtering conditions
        if ($this->id_karyawan_atasan !== '') {
            $query->joinWith('atasan');
            $query->andFilterWhere(['like', 'informasi_pribadi.nama', $this->id_karyawan_atasan]);
        } else {
            $query->joinWith('karyawan');
            $query->andFilterWhere(
                ['like', 'informasi_pribadi.nama', $this->id_karyawan]
            );
        }
        $query->andFilterWhere(
            [
                'id_atasan' => $this->id_atasan
            ]
        );
        return $dataProvider;
    }
}
