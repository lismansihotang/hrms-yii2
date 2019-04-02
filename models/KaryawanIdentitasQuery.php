<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[KaryawanIdentitas]].
 *
 * @see KaryawanIdentitas
 */
class KaryawanIdentitasQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return KaryawanIdentitas[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return KaryawanIdentitas|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
