<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "penggajian_karyawan_detail".
 *
 * @property integer $id_pkd
 * @property integer $id_pk
 * @property integer $id_komponen
 * @property integer $jumlah
 * @property string $nominal
 * @property string $subtotal
 */
class PenggajianKaryawanDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'penggajian_karyawan_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pk', 'id_komponen', 'jumlah'], 'integer'],
            [['nominal', 'subtotal'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pkd' => 'ID. Penggajian Karyawan Detail',
            'id_pk' => 'ID. Penggajian Karyawan',
            'id_komponen' => 'ID. Komponen',
            'jumlah' => 'Jumlah',
            'nominal' => 'Nominal',
            'subtotal' => 'Subtotal',
        ];
    }

    /**
     * @inheritdoc
     * @return PenggajianKaryawanDetailQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PenggajianKaryawanDetailQuery(get_called_class());
    }
}
