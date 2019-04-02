<?php
namespace app\models;

use Yii;

/**
 * This is the model class for table "komponen_gaji_karyawan".
 *
 * @property integer $id_kgk
 * @property integer $id_karyawan
 * @property integer $id_komponen
 * @property string  $nominal
 */
class KomponenGajiKaryawan extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'komponen_gaji_karyawan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_karyawan', 'id_komponen'], 'integer'],
            [['nominal'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_kgk'      => 'ID. Komponen Gaji Karyawan',
            'id_karyawan' => 'ID. Karyawan',
            'id_komponen' => 'ID. Komponen',
            'nominal'     => 'Nominal',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKaryawan()
    {
        return $this->hasOne(InformasiPribadi::className(), ['id_karyawan' => 'id_karyawan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKomponenGaji()
    {
        return $this->hasOne(KomponenGaji::className(), ['id_komponen' => 'id_komponen']);
    }

    /**
     * @inheritdoc
     * @return KomponenGajiKaryawanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new KomponenGajiKaryawanQuery(get_called_class());
    }
}
