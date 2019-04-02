<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[BarangInventaris]].
 *
 * @see BarangInventaris
 */
class BarangInventarisQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return BarangInventaris[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return BarangInventaris|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
