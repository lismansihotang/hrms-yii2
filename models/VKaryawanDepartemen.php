<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "v_karyawan_dept".
 *
 * @property integer $id_relasi
 * @property integer $id_karyawan
 * @property integer $id_dept
 * @property string $singkatan
 * @property string $nm_dept
 */
class VKaryawanDepartemen extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'v_karyawan_dept';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_relasi', 'id_karyawan', 'id_dept'], 'integer'],
            [['singkatan'], 'string', 'max' => 6],
            [['nm_dept'], 'string', 'max' => 25],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_relasi' => 'ID Relasi Karyawan Department',
            'id_karyawan' => 'Karyawan',
            'id_dept' => 'Department',
            'singkatan' => 'Singkatan',
            'nm_dept' => 'Nama Department',
        ];
    }

    /**
     * @inheritdoc
     * @return VKaryawanDepartemenQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VKaryawanDepartemenQuery(get_called_class());
    }
}
