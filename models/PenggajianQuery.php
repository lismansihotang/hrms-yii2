<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Penggajian]].
 *
 * @see Penggajian
 */
class PenggajianQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Penggajian[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Penggajian|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
