<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Karyawan]].
 *
 * @see Karyawan
 */
class KaryawanQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Karyawan[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Karyawan|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
