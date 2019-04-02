<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[VKaryawanInventaris]].
 *
 * @see VKaryawanInventaris
 */
class VKaryawanInventarisQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return VKaryawanInventaris[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return VKaryawanInventaris|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
