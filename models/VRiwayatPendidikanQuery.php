<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[VRiwayatPendidikan]].
 *
 * @see VRiwayatPendidikan
 */
class VRiwayatPendidikanQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return VRiwayatPendidikan[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return VRiwayatPendidikan|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
