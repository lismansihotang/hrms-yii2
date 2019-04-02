<?php
namespace app\models;

class User extends \yii\base\Object implements \yii\web\IdentityInterface
{

    /**
     * @var integer $id
     */
    public $id;

    /**
     * @var string $number_id
     */
    public $number_id;

    /**
     * @var string $user_name
     */
    public $user_name;

    /**
     * @var string $user_pass
     */
    public $user_pass;

    /**
     * @var string $auth_key
     */
    public $auth_key;

    public $auth_token;

    public $pass_reset;

    public $pass_generated;

    public $tipe_user;

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        $model = SysUser::find()->where(['id' => $id])->one();
        if (count($model) > 0) {
            $result = new static($model);
        } else {
            $result = null;
        }
        return $result;
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        unset($type);
        $model = SysUser::findOne(['number_id' => $token]);
        if (count($model) > 0) {
            $result = new static($model);
        } else {
            $result = null;
        }
        return $result;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     *
     * @return static|null
     */
    public static function findByUsername($username)
    {
        $model = SysUser::find()->where(['user_name' => $username, 'tipe_user' => 'Admin'])->one();
        if (count($model) > 0) {
            $result = new static($model);
        } else {
            $result = null;
        }
        return $result;
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    /**
     * @return string
     */
    public function  getNumberId()
    {
        return $this->number_id;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     *
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->user_pass === md5($password);
    }
}
