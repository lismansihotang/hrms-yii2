<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "v_karyawan".
 *
 * @property integer $id_karyawan
 * @property string $nik
 * @property string $status
 * @property integer $id_perusahaan
 * @property integer $id_jabatan
 * @property string $tgl_bergabung
 * @property string $nm_jabatan
 * @property string $nama
 * @property string $nm_pt
 */
class VKaryawan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'v_karyawan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_karyawan', 'id_perusahaan', 'id_jabatan'], 'integer'],
            [['status'], 'string'],
            [['tgl_bergabung'], 'safe'],
            [['nik'], 'string', 'max' => 8],
            [['nm_jabatan', 'nama', 'nm_pt'], 'string', 'max' => 35],
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
            'status' => 'Status',
            'id_perusahaan' => 'ID Perusahaan',
            'id_jabatan' => 'ID Jabatan',
            'tgl_bergabung' => 'Tgl. Bergabung',
            'nm_jabatan' => 'Nama Jabatan',
            'nama' => 'Nama',
            'nm_pt' => 'Nama Perusahaan',
        ];
    }

    /**
     * @inheritdoc
     * @return VKaryawanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VKaryawanQuery(get_called_class());
    }
}
