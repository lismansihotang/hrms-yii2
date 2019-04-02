<?php
namespace app\models;

use Yii;

/**
 * This is the model class for table "penggajian_karyawan".
 *
 * @property integer $id_pk
 * @property integer $id_penggajian
 * @property integer $id_karyawan
 * @property string  $pendapatan
 * @property string  $potongan
 */
class PenggajianKaryawan extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'penggajian_karyawan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_penggajian', 'id_karyawan'], 'integer'],
            [['pendapatan', 'potongan'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pk'         => 'ID. Penggajian Karyawan',
            'id_penggajian' => 'ID. Penggajian',
            'id_karyawan'   => 'ID. Karyawan',
            'pendapatan'    => 'Pendapatan',
            'potongan'      => 'Potongan',
        ];
    }



    /**
     * @inheritdoc
     * @return PenggajianKaryawanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PenggajianKaryawanQuery(get_called_class());
    }
}
