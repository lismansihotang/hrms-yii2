<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sys_user".
 *
 * @property integer $id
 * @property string $number_id
 * @property string $user_name
 * @property string $user_pass
 * @property string $auth_key
 * @property string $auth_token
 * @property string $pass_reset
 * @property string $pass_generated
 * @property string $tipe_user
 */
class SysUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sys_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipe_user'], 'string'],
            [['number_id', 'user_name', 'user_pass', 'auth_key', 'auth_token', 'pass_reset', 'pass_generated'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'number_id' => 'Number ID',
            'user_name' => 'User Name',
            'user_pass' => 'User Pass',
            'auth_key' => 'Auth Key',
            'auth_token' => 'Auth Token',
            'pass_reset' => 'Pass Reset',
            'pass_generated' => 'Pass Generated',
            'tipe_user' => 'Tipe User',
        ];
    }

    /**
     * @inheritdoc
     * @return SysQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SysQuery(get_called_class());
    }
}
