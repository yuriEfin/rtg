<?php


namespace frontend\models\hotel;

use Yii;
use common\models\hotel\BaseOrder;
use frontend\models\hotel\query\OrderQuery;

/**
 * This is the model class for table "{{%order}}".
 *
 * @property int       $id
 * @property string    $room_id          Hotel room id
 * @property string    $hotel_id         Hotel id
 * @property string    $username         Username
 * @property int       $phone            Phone
 * @property string    $booked_date_from Booked date
 * @property string    $booked_date_to   Booked date
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
