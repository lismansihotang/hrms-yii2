<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "informasi_pribadi".
 *
 * @property integer $id_info
 * @property integer $id_karyawan
 * @property string $nama
 * @property string $tmp_lahir
 * @property string $tgl_lahir
 * @property string $alamat
 * @property string $no_telp
 * @property string $email
 * @property string $jk
 * @property string $panggilan
 * @property string $status_menikah
 * @property string $status_rumah
 */
class InformasiPribadi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'informasi_pribadi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_karyawan'], 'integer'],
            [['tgl_lahir'], 'safe'],
            [['alamat'], 'string'],
            [['nama', 'tmp_lahir', 'email', 'status_menikah', 'status_rumah'], 'string', 'max' => 35],
            [['no_telp', 'jk', 'panggilan'], 'string', 'max' => 22],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_info' => 'ID. Informasi',
            'id_karyawan' => 'ID. Karyawan',
            'nama' => 'Nama',
            'tmp_lahir' => 'Tempat Lahir',
            'tgl_lahir' => 'Tgl. Lahir',
            'alamat' => 'Alamat',
            'no_telp' => 'No. Telp',
            'email' => 'Email',
            'jk' => 'Jenis Kelamin',
            'panggilan' => 'Nama Panggilan',
            'status_menikah' => 'Status',
            'status_rumah' => 'Rumah Tinggal'
        ];
    }

    /**
     * @inheritdoc
     * @return InformasiPribadiQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new InformasiPribadiQuery(get_called_class());
    }
}
