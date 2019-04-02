<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "karyawan_status".
 *
 * @property integer $id_status_karyawan
 * @property integer $id_status
 * @property integer $id_karyawan
 * @property string $tgl_status
 * @property string $tgl_berlaku
 * @property string $tgl_berakhir
 */
class KaryawanStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'karyawan_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_status', 'id_karyawan'], 'integer'],
            [['tgl_status', 'tgl_berlaku', 'tgl_berakhir'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_status_karyawan' => 'ID Status Karyawan',
            'id_status' => 'Status',
            'id_karyawan' => 'Karyawan',
            'tgl_status' => 'Tgl. Pembuatan',
            'tgl_berlaku' => 'Tgl. Berlaku',
            'tgl_berakhir' => 'Tgl. Berakhir',
        ];
    }

    /**
     * @inheritdoc
     * @return KaryawanStatusQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new KaryawanStatusQuery(get_called_class());
    }
}
