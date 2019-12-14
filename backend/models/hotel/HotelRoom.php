<?php


namespace backend\models\hotel;

use Yii;
use backend\models\hotel\query\HotelRoomQuery;
use common\models\hotel\BaseHotelRoom;
use common\models\hotel\BaseOrder;

/**
 * This is the model class for table "{{%hotel_room}}".
 *
 * @property int         $id
 * @property int         $hotel_id   Hotel ID
 * @property string      $number     Number
 * @property string      $created_at Created at
 * @property string      $updated_at Updated at
 *
 * @property Hotel       $hotel
 * @property BaseOrder[] $orders
 */
class HotelRoom extends BaseHotelRoom
{
    /**
     * {@inheritdoc}
     * @return \backend\models\hotel\query\HotelRoomQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new HotelRoomQuery(get_called_class());
    }
}
