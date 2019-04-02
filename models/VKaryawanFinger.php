<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "v_karyawan_finger".
 *
 * @property integer $id_kfi
 * @property string $log_finger_id
 * @property integer $id_karyawan
 * @property string $nama
 */
class VKaryawanFinger extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'v_karyawan_finger';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_kfi', 'id_karyawan'], 'integer'],
            [['log_finger_id'], 'string', 'max' => 15],
            [['nama'], 'string', 'max' => 35],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_kfi' => 'ID',
            'log_finger_id' => 'ID Finger',
            'id_karyawan' => 'ID Karyawan',
            'nama' => 'Nama',
        ];
    }

    /**
     * @inheritdoc
     * @return VKaryawanFingerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VKaryawanFingerQuery(get_called_class());
    }
}
