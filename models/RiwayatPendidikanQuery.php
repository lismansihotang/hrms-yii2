<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[RiwayatPendidikan]].
 *
 * @see RiwayatPendidikan
 */
class RiwayatPendidikanQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return RiwayatPendidikan[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return RiwayatPendidikan|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
