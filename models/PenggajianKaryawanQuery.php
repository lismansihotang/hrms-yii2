<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[PenggajianKaryawan]].
 *
 * @see PenggajianKaryawan
 */
class PenggajianKaryawanQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return PenggajianKaryawan[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return PenggajianKaryawan|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
