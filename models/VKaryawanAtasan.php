<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "v_karyawan_atasan".
 *
 * @property integer $id_atasan
 * @property integer $id_karyawan_atasan
 * @property integer $id_karyawan
 * @property string $nama
 */
class VKaryawanAtasan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'v_karyawan_atasan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_atasan', 'id_karyawan_atasan', 'id_karyawan'], 'integer'],
            [['nama'], 'string', 'max' => 35],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_atasan' => 'ID. Karyawan Atasan',
            'id_karyawan_atasan' => 'ID. Atasan',
            'id_karyawan' => 'ID. Karyawan',
            'nama' => 'Nama',
        ];
    }

    /**
     * @inheritdoc
     * @return VKaryawanAtasanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VKaryawanAtasanQuery(get_called_class());
    }
}
