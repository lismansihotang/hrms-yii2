<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[VKaryawanFinger]].
 *
 * @see VKaryawanFinger
 */
class VKaryawanFingerQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return VKaryawanFinger[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return VKaryawanFinger|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
