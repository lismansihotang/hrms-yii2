<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jabatan".
 *
 * @property integer $id
 * @property string $nm_jabatan
 * @property integer $id_perusahaan
 */
class Jabatan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jabatan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_perusahaan'], 'integer'],
            [['nm_jabatan'], 'string', 'max' => 35],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nm_jabatan' => 'Nama Jabatan',
            'id_perusahaan' => 'ID Perusahaan',
        ];
    }

    /**
     * @inheritdoc
     * @return JabatanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new JabatanQuery(get_called_class());
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerusahaan(){
        return $this->hasOne(Perusahaan::className(),['id'=>'id_perusahaan']);
    }
}
