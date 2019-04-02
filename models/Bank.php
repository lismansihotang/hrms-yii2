<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bank".
 *
 * @property integer $id_bank
 * @property string $nm_bank
 * @property string $deskripsi
 */
class Bank extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bank';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nm_bank'], 'string', 'max' => 15],
            [['deskripsi'], 'string', 'max' => 35],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_bank' => 'ID Bank',
            'nm_bank' => 'Nama Bank',
            'deskripsi' => 'Deskripsi',
        ];
    }

    /**
     * @inheritdoc
     * @return BankQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BankQuery(get_called_class());
    }
}
