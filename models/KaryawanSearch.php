<?php
namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Karyawan;

/**
 * KaryawanSearch represents the model behind the search form about `app\models\Karyawan`.
 */
class KaryawanSearch extends Karyawan
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_karyawan', 'nik', 'id_status', 'tgl_bergabung', 'id_perusahaan', 'id_jabatan'], 'safe'],
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
        $query = Karyawan::find();
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
        $query->joinWith('perusahaan');
        $query->joinWith('jabatan');
        $query->joinWith('status');
        // grid filtering conditions
        $query->andFilterWhere(
            [
                'tgl_bergabung' => $this->tgl_bergabung,
            ]
        );
       
        $query->andFilterWhere(['like', 'nik', $this->nik])
            ->andFilterWhere(['like', 'm_status.nm_status', $this->id_status])
            ->andFilterWhere(['like', 'informasi_pribadi.nama', $this->id_karyawan])
            ->andFilterWhere(['like', 'perusahaan.nm_pt', $this->id_perusahaan])
            ->andFilterWhere(['like', 'jabatan.nm_jabatan', $this->id_jabatan]);
        return $dataProvider;
    }
}
