<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[KaryawanStatus]].
 *
 * @see KaryawanStatus
 */
class KaryawanStatusQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return KaryawanStatus[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return KaryawanStatus|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
