<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[PenggajianKaryawanDetail]].
 *
 * @see PenggajianKaryawanDetail
 */
class PenggajianKaryawanDetailQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return PenggajianKaryawanDetail[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return PenggajianKaryawanDetail|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
