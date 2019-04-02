<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[PenggajianKomponen]].
 *
 * @see PenggajianKomponen
 */
class PenggajianKomponenQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return PenggajianKomponen[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return PenggajianKomponen|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
