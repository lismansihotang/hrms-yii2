<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[KaryawanRekening]].
 *
 * @see KaryawanRekening
 */
class KaryawanRekeningQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return KaryawanRekening[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return KaryawanRekening|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
