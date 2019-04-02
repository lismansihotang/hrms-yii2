<?php
namespace app\models;

use Yii;

/**
 * This is the model class for table "karyawan_finger_id".
 *
 * @property integer $id_kfi
 * @property string  $log_finger_id
 * @property integer $id_karyawan
 */
class KaryawanFingerId extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'karyawan_finger_id';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_karyawan'], 'integer'],
            [['log_finger_id'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_kfi'        => 'ID',
            'log_finger_id' => 'ID Finger',
            'id_karyawan'   => 'ID Karyawan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInformasiPribadi()
    {
        return $this->hasOne(InformasiPribadi::className(), ['id_karyawan' => 'id_karyawan']);
    }

    /**
     * @inheritdoc
     * @return KaryawanFingerIdQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new KaryawanFingerIdQuery(get_called_class());
    }
}
