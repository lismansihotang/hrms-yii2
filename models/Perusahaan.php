<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "perusahaan".
 *
 * @property integer $id
 * @property string $nm_pt
 * @property string $alamat
 * @property string $no_telp
 * @property string $no_fax
 * @property string $email
 */
class Perusahaan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'perusahaan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alamat'], 'string'],
            [['nm_pt', 'no_telp', 'no_fax'], 'string', 'max' => 35],
            [['email'], 'string', 'max' => 75],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID Perusahaan',
            'nm_pt' => 'Nama Perusahaan',
            'alamat' => 'Alamat',
            'no_telp' => 'No. Telp',
            'no_fax' => 'No. Fax',
            'email' => 'Email',
        ];
    }

    /**
     * @inheritdoc
     * @return PerusahaanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PerusahaanQuery(get_called_class());
    }
}
