<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[LogAbsensi]].
 *
 * @see LogAbsensi
 */
class LogAbsensiQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return LogAbsensi[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return LogAbsensi|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
