<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Jabatan]].
 *
 * @see Jabatan
 */
class JabatanQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Jabatan[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Jabatan|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
