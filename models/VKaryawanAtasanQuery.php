<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[VKaryawanAtasan]].
 *
 * @see VKaryawanAtasan
 */
class VKaryawanAtasanQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return VKaryawanAtasan[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return VKaryawanAtasan|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
