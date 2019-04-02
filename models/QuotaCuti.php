<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "quota_cuti".
 *
 * @property integer $id_quota
 * @property string $tahun
 * @property integer $jml
 */
class QuotaCuti extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'quota_cuti';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jml'], 'integer'],
            [['tahun'], 'string', 'max' => 4],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_quota' => 'ID Quota',
            'tahun' => 'Tahun',
            'jml' => 'Jumlah Quota',
        ];
    }

    /**
     * @inheritdoc
     * @return QuotaCutiQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new QuotaCutiQuery(get_called_class());
    }
}
