<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "penggajian_komponen".
 *
 * @property integer $id
 * @property integer $id_penggajian
 * @property integer $id_komponen
 */
class PenggajianKomponen extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'penggajian_komponen';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_penggajian', 'id_komponen'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID. Detail',
            'id_penggajian' => 'ID. Penggajian',
            'id_komponen' => 'ID. Komponen',
        ];
    }

    /**
     * @inheritdoc
     * @return PenggajianKomponenQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PenggajianKomponenQuery(get_called_class());
    }
}
