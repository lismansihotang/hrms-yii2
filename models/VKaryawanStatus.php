<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "v_karyawan_status".
 *
 * @property integer $id_status_karyawan
 * @property integer $id_status
 * @property string $nm_status
 * @property integer $id_karyawan
 * @property string $nama
 * @property string $tgl_status
 * @property string $tgl_berlaku
 * @property string $tgl_berakhir
 */
class VKaryawanStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'v_karyawan_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_status_karyawan', 'id_status', 'id_karyawan'], 'integer'],
            [['tgl_status', 'tgl_berlaku', 'tgl_berakhir'], 'safe'],
            [['nm_status', 'nama'], 'string', 'max' => 35],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_status_karyawan' => 'ID Status Karyawan',
            'id_status' => 'Status',
            'nm_status' => 'Nama Status',
            'id_karyawan' => 'Karyawan',
            'nama' => 'Nama Lengkap',
            'tgl_status' => 'Tgl. Pembuatan',
            'tgl_berlaku' => 'Tgl. Berlaku',
            'tgl_berakhir' => 'Tgl. Berakhir',
        ];
    }

    /**
     * @inheritdoc
     * @return VKaryawanStatusQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VKaryawanStatusQuery(get_called_class());
    }
}
