<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "m_status".
 *
 * @property integer $id_status
 * @property string $nm_status
 */
class Status extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nm_status'], 'string', 'max' => 35],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_status' => 'ID Status',
            'nm_status' => 'Nama Status',
        ];
    }

    /**
     * @inheritdoc
     * @return MStatusQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MStatusQuery(get_called_class());
    }
}
