<?php

namespace backend\models\hotel\query;

/**
 * This is the ActiveQuery class for [[\backend\models\hotel\Hotel]].
 *
 * @see \backend\models\hotel\Hotel
 */
class HotelQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \backend\models\hotel\Hotel[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \backend\models\hotel\Hotel|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
