<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cuti".
 *
 * @property integer $id_cuti
 * @property integer $id_karyawan
 * @property integer $id_tipe_cuti
 * @property string $tgl_mulai_cuti
 * @property string $tgl_berakhir_cuti
 */
class Cuti extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cuti';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_karyawan', 'id_tipe_cuti'], 'integer'],
            [['tgl_mulai_cuti', 'tgl_berakhir_cuti'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_cuti' => 'ID. Cuti',
            'id_karyawan' => 'ID. Karyawan',
            'id_tipe_cuti' => 'ID. Tipe Cuti',
            'tgl_mulai_cuti' => 'Tgl. Mulai Cuti',
            'tgl_berakhir_cuti' => 'Tgl. Berakhir Cuti',
        ];
    }

    /**
     * @inheritdoc
     * @return CutiQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CutiQuery(get_called_class());
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKaryawan()
    {
        return $this->hasOne(InformasiPribadi::className(), ['id_karyawan' => 'id_karyawan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipeCuti()
    {
        return $this->hasOne(TipeCuti::className(), ['id_tipe_cuti' => 'id_tipe_cuti']);
    }
}
