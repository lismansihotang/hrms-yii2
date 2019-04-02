<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "v_komponen_gaji".
 *
 * @property integer $id_karyawan
 * @property string $nik
 * @property integer $id_kgk
 * @property string $nominal
 * @property integer $id_komponen
 * @property string $nm_komponen
 * @property string $kategori_komponen
 */
class VKomponenGaji extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'v_komponen_gaji';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_karyawan', 'id_kgk', 'id_komponen'], 'integer'],
            [['nominal'], 'number'],
            [['kategori_komponen'], 'string'],
            [['nik'], 'string', 'max' => 8],
            [['nm_komponen'], 'string', 'max' => 35],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_karyawan' => 'ID',
            'nik' => 'NIK',
            'id_kgk' => 'ID. Komponen Gaji Karyawan',
            'nominal' => 'Nominal',
            'id_komponen' => 'ID. Komponen',
            'nm_komponen' => 'Nama Komponen',
            'kategori_komponen' => 'Kategori',
        ];
    }

    /**
     * @inheritdoc
     * @return VKomponenGajiQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VKomponenGajiQuery(get_called_class());
    }
}
