<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tempat_pendidikan".
 *
 * @property integer $id_tp
 * @property string $nm_tmpt
 * @property string $alamat
 * @property string $no_telp
 * @property string $no_fax
 * @property string $email
 */
class TempatPendidikan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tempat_pendidikan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alamat'], 'string'],
            [['nm_tmpt', 'email'], 'string', 'max' => 35],
            [['no_telp', 'no_fax'], 'string', 'max' => 22],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_tp' => 'ID. Tempat Pendidikan',
            'nm_tmpt' => 'Nama Tempat Pendidikan',
            'alamat' => 'Alamat',
            'no_telp' => 'No. Telp',
            'no_fax' => 'No. Fax',
            'email' => 'Email',
        ];
    }

    /**
     * @inheritdoc
     * @return TempatPendidikanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TempatPendidikanQuery(get_called_class());
    }
}
