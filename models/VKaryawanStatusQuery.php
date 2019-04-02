<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[VKaryawanStatus]].
 *
 * @see VKaryawanStatus
 */
class VKaryawanStatusQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return VKaryawanStatus[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return VKaryawanStatus|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
