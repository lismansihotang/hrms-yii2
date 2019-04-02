<?php
namespace app\models;

use Yii;

/**
 * This is the model class for table "absensi".
 *
 * @property integer $id_absensi
 * @property integer $id_karyawan
 * @property integer $id_shift
 * @property string  $tgl_absensi
 * @property string  $jam_mulai
 * @property string  $jam_berakhir
 * @property integer $id_tipe_absensi
 */
class Absensi extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'absensi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_karyawan', 'id_shift', 'id_tipe_absensi'], 'integer'],
            [['tgl_absensi', 'jam_mulai', 'jam_berakhir'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_absensi'      => 'ID. Absensi',
            'id_karyawan'     => 'ID. Karyawan',
            'id_shift'        => 'ID. Shift',
            'tgl_absensi'     => 'Tgl. Absensi',
            'jam_mulai'       => 'Jam Mulai',
            'jam_berakhir'    => 'Jam Berakhir',
            'id_tipe_absensi' => 'ID. Tipe Absensi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInformasiPribadi()
    {
        return $this->hasOne(InformasiPribadi::className(), ['id_karyawan' => 'id_karyawan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShift()
    {
        return $this->hasOne(TipeShift::className(), ['id_tipe_shift' => 'id_shift']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipeAbsensi()
    {
        return $this->hasOne(TipeAbsensi::className(), ['id_tipe_absensi' => 'id_tipe_absensi']);
    }

    /**
     * @inheritdoc
     * @return AbsensiQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AbsensiQuery(get_called_class());
    }
}
