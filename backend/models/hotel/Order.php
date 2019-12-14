<?php


namespace backend\models\hotel;

use common\models\hotel\BaseOrder;
use Yii;
use backend\models\hotel\query\OrderQuery;

/**
 * This is the model class for table "{{%order}}".
 *
 * @property int       $id
 * @property int       $room_id          Order room id
 * @property string    $username         Username
 * @property int       $phone            Phone
 * @property string    $booked_date_from Booked date from
 * @property string    $booked_date_to   Booked date to
 * @property string    $created_at       Created at
 * @property string    $updated_at       Updated at
 *
 * @property HotelRoom $room
 */
class Order extends BaseOrder
{
    /**
     * {@inheritdoc}
     * @return OrderQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OrderQuery(get_called_class());
    }
}
