<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "karyawan_identitas".
 *
 * @property integer $id_identitas
 * @property integer $id_karyawan
 * @property string $no_identitas
 * @property integer $id_jenis_identitas
 */
class KaryawanIdentitas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'karyawan_identitas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_karyawan', 'id_jenis_identitas'], 'integer'],
            [['no_identitas'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_identitas' => 'ID Identitas',
            'id_karyawan' => 'Karyawan',
            'no_identitas' => 'No Identitas',
            'id_jenis_identitas' => 'Jenis Identitas',
        ];
    }

    /**
     * @inheritdoc
     * @return KaryawanIdentitasQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new KaryawanIdentitasQuery(get_called_class());
    }
}
