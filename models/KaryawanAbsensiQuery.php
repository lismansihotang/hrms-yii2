<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[KaryawanAbsensi]].
 *
 * @see KaryawanAbsensi
 */
class KaryawanAbsensiQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return KaryawanAbsensi[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return KaryawanAbsensi|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
