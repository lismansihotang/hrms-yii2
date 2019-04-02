<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ToleransiAbsensi]].
 *
 * @see ToleransiAbsensi
 */
class ToleransiAbsensiQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ToleransiAbsensi[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ToleransiAbsensi|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
