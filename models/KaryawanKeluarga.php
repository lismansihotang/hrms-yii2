<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "karyawan_keluarga".
 *
 * @property integer $id_keluarga
 * @property integer $id_karyawan
 * @property integer $id_hub_keluarga
 * @property string $nama
 * @property string $tgl_lahir
 * @property string $tmp_lahir
 * @property string $jk
 * @property string $alamat
 * @property string $no_telp
 * @property string $email
 * @property integer $id_pendidikan
 * @property integer $id_pekerjaan
 * @property integer $id_penghasilan
 */
class KaryawanKeluarga extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'karyawan_keluarga';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_karyawan', 'id_hub_keluarga', 'id_pendidikan', 'id_pekerjaan', 'id_penghasilan'], 'integer'],
            [['tgl_lahir'], 'safe'],
            [['jk', 'alamat'], 'string'],
            [['nama', 'email'], 'string', 'max' => 35],
            [['tmp_lahir'], 'string', 'max' => 25],
            [['no_telp'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_keluarga' => 'ID Keluarga',
            'id_karyawan' => 'Karyawan',
            'id_hub_keluarga' => 'Hubungan Keluarga',
            'nama' => 'Nama',
            'tgl_lahir' => 'Tgl. Lahir',
            'tmp_lahir' => 'Tempat Lahir',
            'jk' => 'Jenis Kelamin',
            'alamat' => 'Alamat',
            'no_telp' => 'No. Telp',
            'email' => 'Email',
            'id_pendidikan' => 'Pendidikan',
            'id_pekerjaan' => 'Pekerjaan',
            'id_penghasilan' => 'Penghasilan',
        ];
    }

    /**
     * @inheritdoc
     * @return KaryawanKeluargaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new KaryawanKeluargaQuery(get_called_class());
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKaryawan()
    {
        return $this->hasOne(InformasiPribadi::className(), ['id_karyawan' => 'id_karyawan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHubunganKeluarga()
    {
        return $this->hasOne(HubunganKeluarga::className(), ['id_hub_keluarga' => 'id_hub_keluarga']);
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
    public function getPekerjaan()
    {
        return $this->hasOne(Pekerjaan::className(), ['id_pekerjaan' => 'id_pekerjaan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPenghasilan()
    {
        return $this->hasOne(Penghasilan::className(), ['id_penghasilan' => 'id_penghasilan']);
    }
}
