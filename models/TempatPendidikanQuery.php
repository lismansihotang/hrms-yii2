<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[TempatPendidikan]].
 *
 * @see TempatPendidikan
 */
class TempatPendidikanQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TempatPendidikan[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TempatPendidikan|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
