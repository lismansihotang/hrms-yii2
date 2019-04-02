<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "v_karyawan_karir".
 *
 * @property integer $id_karir
 * @property integer $id_karyawan
 * @property string $tgl
 * @property string $jenis
 * @property integer $id_jabatan
 * @property string $nm_jabatan
 * @property string $tgl_berlaku
 */
class VKaryawanKarir extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'v_karyawan_karir';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_karir', 'id_karyawan', 'id_jabatan'], 'integer'],
            [['tgl', 'tgl_berlaku'], 'safe'],
            [['jenis'], 'string'],
            [['nm_jabatan'], 'string', 'max' => 35],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_karir' => 'ID Karir',
            'id_karyawan' => 'Karyawan',
            'tgl' => 'Tgl.',
            'jenis' => 'Jenis Karir',
            'id_jabatan' => 'Jabatan',
            'nm_jabatan' => 'Nama Jabatan',
            'tgl_berlaku' => 'Tgl. Berlaku',
        ];
    }

    /**
     * @inheritdoc
     * @return VKaryawanKarirQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VKaryawanKarirQuery(get_called_class());
    }
}
