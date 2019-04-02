<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "v_riwayat_pendidikan".
 *
 * @property integer $id_rp
 * @property integer $id_karyawan
 * @property string $nama
 * @property integer $id_pendidikan
 * @property string $nm_pendidikan
 * @property integer $id_tmpt_pendidikan
 * @property string $nm_tmpt
 * @property string $thn_lulus
 */
class VRiwayatPendidikan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'v_riwayat_pendidikan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_rp', 'id_karyawan', 'id_pendidikan', 'id_tmpt_pendidikan'], 'integer'],
            [['nama', 'nm_pendidikan', 'nm_tmpt'], 'string', 'max' => 35],
            [['thn_lulus'], 'string', 'max' => 4],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_rp' => 'ID. Riwayat Pendidikan',
            'id_karyawan' => 'ID. Karyawan',
            'nama' => 'Nama',
            'id_pendidikan' => 'ID. Pendidikan',
            'nm_pendidikan' => 'Nama Pendidikan',
            'id_tmpt_pendidikan' => 'ID. Tempat Pendidikan',
            'nm_tmpt' => 'Nama Tempat Pendidikan',
            'thn_lulus' => 'Tahun Lulus',
        ];
    }

    /**
     * @inheritdoc
     * @return VRiwayatPendidikanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VRiwayatPendidikanQuery(get_called_class());
    }
}
