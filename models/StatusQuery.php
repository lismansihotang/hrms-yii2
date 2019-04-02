<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Status]].
 *
 * @see Status
 */
class StatusQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Status[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Status|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
