<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[KaryawanInventaris]].
 *
 * @see KaryawanInventaris
 */
class KaryawanInventarisQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return KaryawanInventaris[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return KaryawanInventaris|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
