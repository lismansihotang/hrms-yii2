<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[KomponenGajiKaryawan]].
 *
 * @see KomponenGajiKaryawan
 */
class KomponenGajiKaryawanQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return KomponenGajiKaryawan[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return KomponenGajiKaryawan|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
