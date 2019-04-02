<?php
namespace app\models;

use Yii;

/**
 * This is the model class for table "karyawan_atasan".
 *
 * @property integer $id_atasan
 * @property integer $id_karyawan_atasan
 * @property integer $id_karyawan
 */
class KaryawanAtasan extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'karyawan_atasan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_karyawan_atasan', 'id_karyawan'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_atasan'          => 'ID. Karyawan Atasan',
            'id_karyawan_atasan' => 'ID. Atasan',
            'id_karyawan'        => 'ID. Karyawan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAtasan()
    {
        return $this->hasOne(InformasiPribadi::className(), ['id_karyawan' => 'id_karyawan_atasan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKaryawan()
    {
        return $this->hasOne(InformasiPribadi::className(), ['id_karyawan' => 'id_karyawan']);
    }

    /**
     * @inheritdoc
     * @return KaryawanAtasanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new KaryawanAtasanQuery(get_called_class());
    }
}
