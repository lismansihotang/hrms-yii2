<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "karyawan_rekening".
 *
 * @property integer $id_rekening
 * @property integer $id_karyawan
 * @property integer $id_bank
 * @property string $no_rek
 * @property string $nm_pemilik_rek
 */
class KaryawanRekening extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'karyawan_rekening';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_karyawan', 'id_bank'], 'integer'],
            [['no_rek', 'nm_pemilik_rek'], 'string', 'max' => 35],
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
            'no_rek' => 'No. Rekening',
            'nm_pemilik_rek' => 'Nama Pemilik Rekening',
        ];
    }

    /**
     * @inheritdoc
     * @return KaryawanRekeningQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new KaryawanRekeningQuery(get_called_class());
    }
}
