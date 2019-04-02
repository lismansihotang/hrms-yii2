<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "karyawan_karir".
 *
 * @property integer $id_karir
 * @property integer $id_karyawan
 * @property string $tgl
 * @property string $jenis
 * @property integer $id_jabatan
 * @property string $tgl_berlaku
 */
class KaryawanKarir extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'karyawan_karir';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_karyawan', 'id_jabatan'], 'integer'],
            [['tgl', 'tgl_berlaku'], 'safe'],
            [['jenis'], 'string'],
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
            'tgl_berlaku' => 'Tgl. Berlaku',
        ];
    }

    /**
     * @inheritdoc
     * @return KaryawanKarirQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new KaryawanKarirQuery(get_called_class());
    }
}
