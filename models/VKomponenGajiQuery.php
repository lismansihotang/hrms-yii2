<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[VKomponenGaji]].
 *
 * @see VKomponenGaji
 */
class VKomponenGajiQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return VKomponenGaji[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return VKomponenGaji|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
