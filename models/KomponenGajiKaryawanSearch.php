<?php
namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\KomponenGajiKaryawan;

/**
 * KomponenGajiKaryawanSearch represents the model behind the search form about `app\models\KomponenGajiKaryawan`.
 */
class KomponenGajiKaryawanSearch extends KomponenGajiKaryawan
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_kgk'], 'integer'],
            [['nominal'], 'number'],
            [['id_karyawan', 'id_komponen'], 'string'],
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
        $query = KomponenGajiKaryawan::find();
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
        $query->joinWith('karyawan');
        $query->joinWith('komponenGaji');
        // grid filtering conditions
        $query->andFilterWhere(
            [
                'id_kgk' => $this->id_kgk,
                'nominal' => $this->nominal,
            ]
        );
        $query->andFilterWhere(['like', 'informasi_pribadi.nama', $this->id_karyawan])->andFilterWhere(
            ['like', 'komponen_gaji.nm_komponen', $this->id_komponen]
        );
        return $dataProvider;
    }
}
