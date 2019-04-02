<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hubungan_keluarga".
 *
 * @property integer $id_hub_keluarga
 * @property string $nm_hub_keluarga
 */
class HubunganKeluarga extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hubungan_keluarga';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nm_hub_keluarga'], 'string', 'max' => 25],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_hub_keluarga' => 'ID Hubungan Keluarga',
            'nm_hub_keluarga' => 'Nama Hubungan Keluarga',
        ];
    }

    /**
     * @inheritdoc
     * @return HubunganKeluargaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new HubunganKeluargaQuery(get_called_class());
    }
}
