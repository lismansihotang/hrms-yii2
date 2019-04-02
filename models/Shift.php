<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "shift".
 *
 * @property integer $id_shift
 * @property integer $id_karyawan
 * @property integer $id_tipe_shift
 * @property string $jam_mulai
 * @property string $jam_berakhir
 */
class Shift extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shift';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_karyawan', 'id_tipe_shift'], 'integer'],
            [['jam_mulai', 'jam_berakhir'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_shift' => 'ID Shift',
            'id_karyawan' => 'Id Karyawan',
            'id_tipe_shift' => 'Id Tipe Shift',
            'jam_mulai' => 'Jam Mulai',
            'jam_berakhir' => 'Jam Berakhir',
        ];
    }

    /**
     * @inheritdoc
     * @return ShiftQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ShiftQuery(get_called_class());
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
    public function getTipeShift()
    {
        return $this->hasOne(TipeShift::className(), ['id_tipe_shift' => 'id_tipe_shift']);
    }
}
