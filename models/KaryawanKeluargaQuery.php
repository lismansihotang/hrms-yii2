<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[KaryawanKeluarga]].
 *
 * @see KaryawanKeluarga
 */
class KaryawanKeluargaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return KaryawanKeluarga[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return KaryawanKeluarga|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
