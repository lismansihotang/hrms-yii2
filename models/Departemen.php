<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dept".
 *
 * @property integer $id_dept
 * @property string $singkatan
 * @property string $nm_dept
 * @property integer $id_perusahaan
 */
class Departemen extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dept';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_perusahaan'], 'integer'],
            [['singkatan'], 'string', 'max' => 6],
            [['nm_dept'], 'string', 'max' => 25],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_dept' => 'ID Department',
            'singkatan' => 'Singkatan',
            'nm_dept' => 'Nama Department',
            'id_perusahaan' => 'Perusahaan',
        ];
    }

    /**
     * @inheritdoc
     * @return DepartemenQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DepartemenQuery(get_called_class());
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerusahaan(){
        return $this->hasOne(Perusahaan::className(),['id'=>'id_perusahaan']);
    }
}
