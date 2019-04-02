<?php
namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Penggajian;

/**
 * PenggajianSearch represents the model behind the search form about `app\models\Penggajian`.
 */
class PenggajianSearch extends Penggajian
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_perusahaan'], 'integer'],
            [['tgl', 'bulan', 'tahun', 'tgl_awal', 'tgl_akhir'], 'safe'],
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
        $query = Penggajian::find();
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
        $query->andFilterWhere(
            [
                'id'            => $this->id,
                'tgl'           => $this->tgl,
                'id_perusahaan' => $this->id_perusahaan,
                'tgl_awal'      => $this->tgl_awal,
                'tgl_akhir'     => $this->tgl_akhir
            ]
        );
        $query->andFilterWhere(['like', 'bulan', $this->bulan])
              ->andFilterWhere(['like', 'tahun', $this->tahun]);
        return $dataProvider;
    }
}
