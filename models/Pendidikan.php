<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pendidikan".
 *
 * @property integer $id_pendidikan
 * @property string $nm_pendidikan
 * @property string $deskripsi
 */
class Pendidikan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pendidikan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nm_pendidikan'], 'string', 'max' => 35],
            [['deskripsi'], 'string', 'max' => 75],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pendidikan' => 'ID. Pendidikan',
            'nm_pendidikan' => 'Nama Pendidikan',
            'deskripsi' => 'Deskripsi',
        ];
    }

    /**
     * @inheritdoc
     * @return PendidikanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PendidikanQuery(get_called_class());
    }
}
