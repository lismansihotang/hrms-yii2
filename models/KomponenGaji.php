<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "komponen_gaji".
 *
 * @property integer $id_komponen
 * @property string $nm_komponen
 * @property string $kategori_komponen
 * @property string $tipe
 */
class KomponenGaji extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'komponen_gaji';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kategori_komponen', 'tipe'], 'string'],
            [['nm_komponen'], 'string', 'max' => 35],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_komponen' => 'ID. Komponen',
            'nm_komponen' => 'Nama Komponen',
            'kategori_komponen' => 'Kategori',
            'tipe' => 'Tipe',
        ];
    }

    /**
     * @inheritdoc
     * @return KomponenGajiQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new KomponenGajiQuery(get_called_class());
    }
}
