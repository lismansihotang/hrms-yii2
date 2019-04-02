<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "v_karyawan_identitas".
 *
 * @property integer $id_identitas
 * @property integer $id_karyawan
 * @property string $no_identitas
 * @property integer $id_jenis_identitas
 * @property string $nm_jenis_identitas
 */
class VKaryawanIdentitas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'v_karyawan_identitas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_identitas', 'id_karyawan', 'id_jenis_identitas'], 'integer'],
            [['no_identitas'], 'string', 'max' => 45],
            [['nm_jenis_identitas'], 'string', 'max' => 25],
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
            'nm_jenis_identitas' => 'Nama Jenis Identitas',
        ];
    }

    /**
     * @inheritdoc
     * @return VKaryawanIdentitasQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VKaryawanIdentitasQuery(get_called_class());
    }
}
