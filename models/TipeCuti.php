<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipe_cuti".
 *
 * @property integer $id_tipe_cuti
 * @property string $nm_tipe_cuti
 * @property integer $jatah_cuti
 */
class TipeCuti extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipe_cuti';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jatah_cuti'], 'integer'],
            [['nm_tipe_cuti'], 'string', 'max' => 35],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_tipe_cuti' => 'ID. Tipe Cuti',
            'nm_tipe_cuti' => 'Nama Tipe Cuti',
            'jatah_cuti' => 'Jatah Cuti',
        ];
    }

    /**
     * @inheritdoc
     * @return TipeCutiQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TipeCutiQuery(get_called_class());
    }
}
