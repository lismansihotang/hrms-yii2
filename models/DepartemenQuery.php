<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Departemen]].
 *
 * @see Departemen
 */
class DepartemenQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Departemen[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Departemen|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
