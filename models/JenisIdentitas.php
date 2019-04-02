<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jenis_identitas".
 *
 * @property integer $id_jenis_identitas
 * @property string $nm_jenis_identitas
 */
class JenisIdentitas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jenis_identitas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nm_jenis_identitas'], 'string', 'max' => 25],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_jenis_identitas' => 'ID Jenis Identitas',
            'nm_jenis_identitas' => 'Nama Jenis Identitas',
        ];
    }

    /**
     * @inheritdoc
     * @return JenisIdentitasQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new JenisIdentitasQuery(get_called_class());
    }
}
