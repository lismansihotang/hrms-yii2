<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[HubunganKeluarga]].
 *
 * @see HubunganKeluarga
 */
class HubunganKeluargaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return HubunganKeluarga[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return HubunganKeluarga|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
