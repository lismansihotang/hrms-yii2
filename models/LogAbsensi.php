<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "log_absensi".
 *
 * @property integer $id
 * @property integer $log_match_id
 * @property string $log_finger_id
 * @property string $log_fulldate
 * @property integer $log_type
 * @property string $log_date
 * @property string $log_time
 */
class LogAbsensi extends \yii\db\ActiveRecord
{
    /**
     * @var
     */
    public $fileXls;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'log_absensi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['log_match_id', 'log_type'], 'integer'],
            [['log_fulldate', 'log_date', 'log_time'], 'safe'],
            [['log_finger_id'], 'string', 'max' => 15],
            [['fileXls'], 'file', 'extensions' => 'xls']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'log_match_id' => 'Match Id',
            'log_finger_id' => 'ID Finger',
            'log_fulldate' => 'Full Tgl',
            'log_type' => 'Tipe Absensi',
            'log_date' => 'Tgl',
            'log_time' => 'Jam',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKaryawan()
    {
        return $this->hasOne(VKaryawanFinger::className(), ['log_finger_id' => 'log_finger_id']);
    }
}
