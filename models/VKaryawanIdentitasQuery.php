<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[VKaryawanIdentitas]].
 *
 * @see VKaryawanIdentitas
 */
class VKaryawanIdentitasQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return VKaryawanIdentitas[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return VKaryawanIdentitas|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
