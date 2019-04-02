<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jenis_sanksi".
 *
 * @property integer $id_jenis_sanksi
 * @property string $nm_jenis_sanksi
 */
class JenisSanksi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jenis_sanksi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nm_jenis_sanksi'], 'string', 'max' => 25],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_jenis_sanksi' => 'ID Jenis Sanksi',
            'nm_jenis_sanksi' => 'Nama Jenis Sanksi',
        ];
    }

    /**
     * @inheritdoc
     * @return JenisSanksiQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new JenisSanksiQuery(get_called_class());
    }
}
