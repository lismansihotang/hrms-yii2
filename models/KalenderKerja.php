<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kalender_kerja".
 *
 * @property integer $id_kalender
 * @property string $bulan
 * @property string $thn
 * @property integer $hari_kerja
 * @property integer $libur
 */
class KalenderKerja extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kalender_kerja';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bulan'], 'string'],
            [['hari_kerja', 'libur'], 'integer'],
            [['thn'], 'string', 'max' => 4],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_kalender' => 'ID Kalender Kerja',
            'bulan' => 'Bulan',
            'thn' => 'Tahun',
            'hari_kerja' => 'Jml Hari Kerja',
            'libur' => 'Jml Hari Libur',
        ];
    }

    /**
     * @inheritdoc
     * @return KalenderKerjaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new KalenderKerjaQuery(get_called_class());
    }
}
