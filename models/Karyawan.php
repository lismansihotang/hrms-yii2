<?php
namespace app\models;

use Yii;

/**
 * This is the model class for table "karyawan".
 *
 * @property integer $id_karyawan
 * @property string $nik
 * @property integer $id_status
 * @property integer $id_perusahaan
 * @property integer $id_jabatan
 * @property string $tgl_bergabung
 */
class Karyawan extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'karyawan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_status'], 'integer'],
            [['id_perusahaan', 'id_jabatan'], 'integer'],
            [['tgl_bergabung'], 'safe'],
            [['nik'], 'string', 'max' => 8],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_karyawan' => 'ID',
            'nik' => 'NIK',
            'id_status' => 'Status',
            'id_perusahaan' => 'ID Perusahaan',
            'id_jabatan' => 'ID Jabatan',
            'tgl_bergabung' => 'Tgl. Bergabung',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJabatan()
    {
        return $this->hasOne(Jabatan::className(), ['id' => 'id_jabatan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerusahaan()
    {
        return $this->hasOne(Perusahaan::className(), ['id' => 'id_perusahaan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInformasiPribadi()
    {
        return $this->hasOne(InformasiPribadi::className(), ['id_karyawan' => 'id_karyawan']);
    }

    /**
     * @inheritdoc
     * @return KaryawanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new KaryawanQuery(get_called_class());
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::className(), ['id_status' => 'id_status']);
    }
}
