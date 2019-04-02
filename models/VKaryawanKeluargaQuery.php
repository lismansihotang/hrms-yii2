<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[VKaryawanKeluarga]].
 *
 * @see VKaryawanKeluarga
 */
class VKaryawanKeluargaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return VKaryawanKeluarga[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return VKaryawanKeluarga|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
