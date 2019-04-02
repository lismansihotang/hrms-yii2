<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipe_absensi".
 *
 * @property integer $id_tipe_absensi
 * @property string $nm_tipe_absensi
 */
class TipeAbsensi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipe_absensi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nm_tipe_absensi'], 'string', 'max' => 35],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_tipe_absensi' => 'ID. Tipe Absensi',
            'nm_tipe_absensi' => 'Nama Tipe Absensi',
        ];
    }

    /**
     * @inheritdoc
     * @return TipeAbsensiQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TipeAbsensiQuery(get_called_class());
    }
}
