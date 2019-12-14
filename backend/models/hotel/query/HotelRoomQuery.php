<?php

namespace backend\models\hotel\query;

/**
 * This is the ActiveQuery class for [[\backend\models\hotel\HotelRoom]].
 *
 * @see \backend\models\hotel\HotelRoom
 */
class HotelRoomQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \backend\models\hotel\HotelRoom[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \backend\models\hotel\HotelRoom|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
