<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[VKaryawanSanksi]].
 *
 * @see VKaryawanSanksi
 */
class VKaryawanSanksiQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return VKaryawanSanksi[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return VKaryawanSanksi|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
