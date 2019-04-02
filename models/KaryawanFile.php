<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "karyawan_file".
 *
 * @property integer $id_file
 * @property integer $id_karyawan
 * @property string $nm_file
 * @property string $is_active
 */
class KaryawanFile extends \yii\db\ActiveRecord
{
    /**
     * @var
     */
    public $image;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'karyawan_file';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_karyawan'], 'integer'],
            [['is_active'], 'string'],
            [['nm_file'], 'string', 'max' => 75],
            [['image'], 'file', 'extensions' => 'jpg, gif, png, jpeg'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_file' => 'ID File',
            'id_karyawan' => 'Karyawan',
            'nm_file' => 'Nama File',
            'is_active' => 'Active (1 Jika Ya)',
        ];
    }

    /**
     * @inheritdoc
     * @return KaryawanFileQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new KaryawanFileQuery(get_called_class());
    }
}
