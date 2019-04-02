<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[VKaryawanRekening]].
 *
 * @see VKaryawanRekening
 */
class VKaryawanRekeningQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return VKaryawanRekening[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return VKaryawanRekening|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
