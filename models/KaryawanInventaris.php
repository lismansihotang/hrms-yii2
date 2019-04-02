<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "karyawan_inventaris".
 *
 * @property integer $id_inventaris
 * @property integer $id_karyawan
 * @property string $tgl_inventaris
 * @property string $tgl_terima
 * @property string $tgl_kembali
 * @property integer $id_barang_inventaris
 * @property integer $jml
 * @property string $ket
 */
class KaryawanInventaris extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'karyawan_inventaris';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_karyawan', 'id_barang_inventaris', 'jml'], 'integer'],
            [['tgl_inventaris', 'tgl_terima', 'tgl_kembali'], 'safe'],
            [['ket'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_inventaris' => 'ID Inventaris',
            'id_karyawan' => 'Karyawan',
            'tgl_inventaris' => 'Tgl. Inventaris',
            'tgl_terima' => 'Tgl. Terima',
            'tgl_kembali' => 'Tgl. Kembali',
            'id_barang_inventaris' => 'Barang Inventaris',
            'jml' => 'Jml',
            'ket' => 'Keterangan',
        ];
    }

    /**
     * @inheritdoc
     * @return KaryawanInventarisQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new KaryawanInventarisQuery(get_called_class());
    }
}
