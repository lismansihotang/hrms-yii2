<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[KaryawanFile]].
 *
 * @see KaryawanFile
 */
class KaryawanFileQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return KaryawanFile[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return KaryawanFile|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
