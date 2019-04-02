<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "karyawan_sanksi".
 *
 * @property integer $id_sanksi
 * @property integer $id_karyawan
 * @property integer $id_jenis_sanksi
 * @property string $tgl_sanksi
 * @property string $tgl_berlaku
 * @property string $tgl_berakhir
 */
class KaryawanSanksi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'karyawan_sanksi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_karyawan', 'id_jenis_sanksi'], 'integer'],
            [['tgl_sanksi', 'tgl_berlaku', 'tgl_berakhir'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_sanksi' => 'ID Sanksi',
            'id_karyawan' => 'Karyawan',
            'id_jenis_sanksi' => 'Jenis Sanksi',
            'tgl_sanksi' => 'Tgl. Sanksi',
            'tgl_berlaku' => 'Tgl. Berlaku',
            'tgl_berakhir' => 'Tgl. Berakhir',
        ];
    }

    /**
     * @inheritdoc
     * @return KaryawanSanksiQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new KaryawanSanksiQuery(get_called_class());
    }
}
