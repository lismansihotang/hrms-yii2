<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "v_karyawan_rekening".
 *
 * @property integer $id_rekening
 * @property integer $id_karyawan
 * @property integer $id_bank
 * @property string $nm_bank
 * @property string $deskripsi
 * @property string $no_rek
 * @property string $nm_pemilik_rek
 */
class VKaryawanRekening extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'v_karyawan_rekening';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_rekening', 'id_karyawan', 'id_bank'], 'integer'],
            [['nm_bank'], 'string', 'max' => 15],
            [['deskripsi', 'no_rek', 'nm_pemilik_rek'], 'string', 'max' => 35],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_rekening' => 'ID Rekening',
            'id_karyawan' => 'Karyawan',
            'id_bank' => 'Bank',
            'nm_bank' => 'Nama Bank',
            'deskripsi' => 'Deskripsi',
            'no_rek' => 'No. Rekening',
            'nm_pemilik_rek' => 'Nama Pemilik Rekening',
        ];
    }

    /**
     * @inheritdoc
     * @return VKaryawanRekeningQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VKaryawanRekeningQuery(get_called_class());
    }
}
