<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[SysUser]].
 *
 * @see SysUser
 */
class SysUserQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return SysUser[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SysUser|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
