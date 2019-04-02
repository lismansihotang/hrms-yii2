<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[KalenderLibur]].
 *
 * @see KalenderLibur
 */
class KalenderLiburQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return KalenderLibur[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return KalenderLibur|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
