<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[KalenderKerja]].
 *
 * @see KalenderKerja
 */
class KalenderKerjaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return KalenderKerja[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return KalenderKerja|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
