<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pekerjaan".
 *
 * @property integer $id_pekerjaan
 * @property string $nm_pekerjaan
 */
class Pekerjaan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pekerjaan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nm_pekerjaan'], 'string', 'max' => 25],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pekerjaan' => 'ID Pekerjaan',
            'nm_pekerjaan' => 'Nama Pekerjaan',
        ];
    }

    /**
     * @inheritdoc
     * @return PekerjaanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PekerjaanQuery(get_called_class());
    }
}
