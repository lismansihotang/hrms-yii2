<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipe_shift".
 *
 * @property integer $id_tipe_shift
 * @property string $nm_shift
 */
class TipeShift extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipe_shift';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nm_shift'], 'string', 'max' => 35],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_tipe_shift' => 'ID. Tipe Shift',
            'nm_shift' => 'Nama Shift',
        ];
    }
}
