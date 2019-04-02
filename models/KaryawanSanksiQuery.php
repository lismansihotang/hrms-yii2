<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[KaryawanSanksi]].
 *
 * @see KaryawanSanksi
 */
class KaryawanSanksiQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return KaryawanSanksi[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return KaryawanSanksi|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
