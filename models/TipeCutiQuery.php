<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[TipeCuti]].
 *
 * @see TipeCuti
 */
class TipeCutiQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TipeCuti[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TipeCuti|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
