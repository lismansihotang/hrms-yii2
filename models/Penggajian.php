<?php
namespace app\models;

use Yii;

/**
 * This is the model class for table "penggajian".
 *
 * @property integer $id
 * @property string  $tgl
 * @property string  $tgl_awal
 * @property string  $tgl_akhir
 * @property string  $bulan
 * @property string  $tahun
 * @property integer $id_perusahaan
 */
class Penggajian extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'penggajian';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tgl', 'bulan', 'tahun', 'id_perusahaan', 'tgl_awal', 'tgl_akhir'], 'required'],
            [['tgl', 'tgl_awal', 'tgl_akhir'], 'safe'],
            [['bulan'], 'string'],
            [['id_perusahaan'], 'integer'],
            [['tahun'], 'string', 'max' => 4],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'            => 'ID. Penggajian',
            'tgl'           => 'Tgl. Penggajian',
            'bulan'         => 'Bulan Penggajian',
            'tahun'         => 'Tahun Penggajian',
            'id_perusahaan' => 'ID Perusahaan',
            'tgl_awal'      => 'Tgl. Awal Cut Off',
            'tgl_akhir'     => 'Tgl. Akhir Cut Off'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerusahaan()
    {
        return $this->hasOne(Perusahaan::className(), ['id' => 'id_perusahaan']);
    }

    /**
     * @inheritdoc
     * @return PenggajianQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PenggajianQuery(get_called_class());
    }
}
