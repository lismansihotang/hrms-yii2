<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Absensi]].
 *
 * @see Absensi
 */
class AbsensiQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Absensi[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Absensi|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
