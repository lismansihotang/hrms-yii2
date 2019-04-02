<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "v_karyawan_keluarga".
 *
 * @property integer $id_keluarga
 * @property integer $id_karyawan
 * @property integer $id_hub_keluarga
 * @property string $nm_hub_keluarga
 * @property string $nama
 * @property string $tgl_lahir
 * @property string $tmp_lahir
 * @property string $jk
 * @property string $alamat
 * @property string $no_telp
 * @property string $email
 * @property integer $id_pendidikan
 * @property string $nm_pendidikan
 * @property integer $id_pekerjaan
 * @property string $range_penghasilan
 * @property integer $id_penghasilan
 * @property string $nm_pekerjaan
 */
class VKaryawanKeluarga extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'v_karyawan_keluarga';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_keluarga', 'id_karyawan', 'id_hub_keluarga', 'id_pendidikan', 'id_pekerjaan', 'id_penghasilan'], 'integer'],
            [['tgl_lahir'], 'safe'],
            [['jk', 'alamat'], 'string'],
            [['nm_hub_keluarga', 'tmp_lahir', 'range_penghasilan', 'nm_pekerjaan'], 'string', 'max' => 25],
            [['nama', 'email', 'nm_pendidikan'], 'string', 'max' => 35],
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
            'nm_hub_keluarga' => 'Nama Hubungan Keluarga',
            'nama' => 'Nama',
            'tgl_lahir' => 'Tgl. Lahir',
            'tmp_lahir' => 'Tempat Lahir',
            'jk' => 'Jenis Kelamin',
            'alamat' => 'Alamat',
            'no_telp' => 'No. Telp',
            'email' => 'Email',
            'id_pendidikan' => 'Pendidikan',
            'nm_pendidikan' => 'Nama Pendidikan',
            'id_pekerjaan' => 'Pekerjaan',
            'range_penghasilan' => 'Range Penghasilan',
            'id_penghasilan' => 'Penghasilan',
            'nm_pekerjaan' => 'Nama Pekerjaan',
        ];
    }

    /**
     * @inheritdoc
     * @return VKaryawanKeluargaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VKaryawanKeluargaQuery(get_called_class());
    }
}
