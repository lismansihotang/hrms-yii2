<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[KaryawanDepartemen]].
 *
 * @see KaryawanDepartemen
 */
class KaryawanDepartemenQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return KaryawanDepartemen[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return KaryawanDepartemen|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
