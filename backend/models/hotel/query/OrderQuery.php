<?php

namespace backend\models\hotel\query;

/**
 * This is the ActiveQuery class for [[\backend\models\hotel\Order]].
 *
 * @see \backend\models\hotel\Order
 */
class OrderQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \backend\models\hotel\Order[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \backend\models\hotel\Order|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
