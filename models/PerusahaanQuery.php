<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Perusahaan]].
 *
 * @see Perusahaan
 */
class PerusahaanQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Perusahaan[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Perusahaan|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
