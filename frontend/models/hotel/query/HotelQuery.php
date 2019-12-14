<?php

namespace frontend\models\hotel\query;

/**
 * This is the ActiveQuery class for [[\frontend\models\hotel\Hotel]].
 *
 * @see \frontend\models\hotel\Hotel
 */
class HotelQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \frontend\models\hotel\Hotel[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \frontend\models\hotel\Hotel|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
