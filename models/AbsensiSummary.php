<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "absensi_summary".
 *
 * @property integer $id
 * @property integer $id_penggajian
 * @property integer $id_karyawan
 * @property string $tgl
 * @property string $bulan
 * @property string $tahun
 * @property integer $hadir
 * @property integer $absen
 * @property integer $cuti
 * @property integer $sakit
 * @property integer $ijin
 * @property integer $lain
 */
class AbsensiSummary extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'absensi_summary';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_penggajian', 'id_karyawan', 'hadir', 'absen', 'cuti', 'sakit', 'ijin', 'lain'], 'integer'],
            [['tgl'], 'safe'],
            [['bulan'], 'string'],
            [['tahun'], 'string', 'max' => 4],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_penggajian' => 'ID. Penggajian',
            'id_karyawan' => 'ID. Karyawan',
            'tgl' => 'Tgl',
            'bulan' => 'Bulan',
            'tahun' => 'Tahun',
            'hadir' => 'Kehadiran',
            'absen' => 'Absen',
            'cuti' => 'Cuti',
            'sakit' => 'Sakit',
            'ijin' => 'Ijin',
            'lain' => 'Lainnnya',
        ];
    }

    /**
     * @inheritdoc
     * @return AbsensiSummaryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AbsensiSummaryQuery(get_called_class());
    }
}
