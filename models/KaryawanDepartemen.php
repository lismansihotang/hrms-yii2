<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "karyawan_dept".
 *
 * @property integer $id_relasi
 * @property integer $id_karyawan
 * @property integer $id_dept
 */
class KaryawanDepartemen extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'karyawan_dept';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_karyawan', 'id_dept'], 'integer'],
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
        ];
    }

    /**
     * @inheritdoc
     * @return KaryawanDepartemenQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new KaryawanDepartemenQuery(get_called_class());
    }
}
