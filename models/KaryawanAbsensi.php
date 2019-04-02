<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "karyawan_absensi".
 *
 * @property integer $id_karyawan_absensi
 * @property integer $id_karyawan
 * @property string $tgl_absensi
 * @property integer $id_tipe_absensi
 */
class KaryawanAbsensi extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'karyawan_absensi';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id_karyawan', 'id_tipe_absensi'], 'integer'],
            [['tgl_absensi'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id_karyawan_absensi' => 'ID Karyawan Absensi',
            'id_karyawan' => 'ID Karyawan',
            'tgl_absensi' => 'Tanggal',
            'id_tipe_absensi' => 'Tipe Absensi',
        ];
    }

    /**
     * 
     * @return type
     */
    public function getKaryawan() {
        return $this->hasOne(InformasiPribadi::className(), ['id_karyawan' => 'id_karyawan']);
    }

    /**
     * 
     * @return type
     */
    public function getTipeAbsensi() {
        return $this->hasOne(TipeAbsensi::className(), ['id_tipe_absensi' => 'id_tipe_absensi']);
    }

    /**
     * @inheritdoc
     * @return KaryawanAbsensiQuery the active query used by this AR class.
     */
    public static function find() {
        return new KaryawanAbsensiQuery(get_called_class());
    }

}
