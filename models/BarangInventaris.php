<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "barang_inventaris".
 *
 * @property integer $id_barang_inventaris
 * @property string $nm_barang
 */
class BarangInventaris extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'barang_inventaris';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nm_barang'], 'string', 'max' => 25],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_barang_inventaris' => 'ID Barang Inventaris',
            'nm_barang' => 'Nama Barang Inventaris',
        ];
    }

    /**
     * @inheritdoc
     * @return BarangInventarisQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BarangInventarisQuery(get_called_class());
    }
}
