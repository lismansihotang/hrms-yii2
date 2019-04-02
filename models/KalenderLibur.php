<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kalender_libur".
 *
 * @property integer $id_kalender_libur
 * @property string $thn_libur
 * @property string $tgl_libur
 */
class KalenderLibur extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kalender_libur';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tgl_libur'], 'safe'],
            [['thn_libur'], 'string', 'max' => 4],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_kalender_libur' => 'ID Kalender Libur',
            'thn_libur' => 'Tahun',
            'tgl_libur' => 'Tgl. Libur',
        ];
    }

    /**
     * @inheritdoc
     * @return KalenderLiburQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new KalenderLiburQuery(get_called_class());
    }
}
