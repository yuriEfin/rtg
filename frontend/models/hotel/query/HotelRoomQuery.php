<?php

namespace frontend\models\hotel\query;

/**
 * This is the ActiveQuery class for [[\frontend\models\hotel\HotelRoom]].
 *
 * @see \frontend\models\hotel\HotelRoom
 */
class HotelRoomQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \frontend\models\hotel\HotelRoom[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \frontend\models\hotel\HotelRoom|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
