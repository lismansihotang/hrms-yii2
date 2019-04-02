<?php
namespace app\models;

use Yii;

/**
 * This is the model class for table "riwayat_pendidikan".
 *
 * @property integer $id_rp
 * @property integer $id_karyawan
 * @property integer $id_pendidikan
 * @property integer $id_tmpt_pendidikan
 * @property string  $thn_lulus
 */
class RiwayatPendidikan extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'riwayat_pendidikan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_karyawan', 'id_pendidikan', 'id_tmpt_pendidikan'], 'integer'],
            [['thn_lulus'], 'string', 'max' => 4],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_rp'              => 'ID. Riwayat Pendidikan',
            'id_karyawan'        => 'ID. Karyawan',
            'id_pendidikan'      => 'ID. Pendidikan',
            'id_tmpt_pendidikan' => 'ID. Tempat Pendidikan',
            'thn_lulus'          => 'Tahun Lulus',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInformasiPribadi()
    {
        return $this->hasOne(InformasiPribadi::className(), ['id_karyawan' => 'id_karyawan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPendidikan()
    {
        return $this->hasOne(Pendidikan::className(), ['id_pendidikan' => 'id_pendidikan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTempatPendidikan()
    {
        return $this->hasOne(TempatPendidikan::className(), ['id_tp' => 'id_tmpt_pendidikan']);
    }

    /**
     * @inheritdoc
     * @return RiwayatPendidikanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RiwayatPendidikanQuery(get_called_class());
    }
}
