<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "penghasilan".
 *
 * @property integer $id_penghasilan
 * @property string $range_penghasilan
 */
class Penghasilan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'penghasilan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['range_penghasilan'], 'string', 'max' => 25],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_penghasilan' => 'ID Penghasilan',
            'range_penghasilan' => 'Range Penghasilan',
        ];
    }

    /**
     * @inheritdoc
     * @return PenghasilanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PenghasilanQuery(get_called_class());
    }
}
