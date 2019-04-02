<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "toleransi_absensi".
 *
 * @property integer $id_tolernasi
 * @property integer $id_tipe_absensi
 * @property string $tahun
 * @property integer $jml
 */
class ToleransiAbsensi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'toleransi_absensi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tipe_absensi', 'jml'], 'integer'],
            [['tahun'], 'string', 'max' => 4],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_tolernasi' => 'ID Toleransi',
            'id_tipe_absensi' => 'ID Jenis Absensi',
            'tahun' => 'Tahun',
            'jml' => 'Jml Toleransi',
        ];
    }

    /**
     * @inheritdoc
     * @return ToleransiAbsensiQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ToleransiAbsensiQuery(get_called_class());
    }
    
     public function getTipeAbsensi()
    {
        return $this->hasOne(TipeAbsensi::className(), ['id_tipe_absensi' => 'id_tipe_absensi']);
    }

}
