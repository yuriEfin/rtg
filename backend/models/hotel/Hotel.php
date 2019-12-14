<?php


namespace backend\models\hotel;

use Yii;
use common\models\hotel\BaseHotel;
use backend\models\hotel\query\HotelQuery;

/**
 * This is the model class for table "{{%hotel}}".
 *
 * @property int         $id
 * @property string      $title Title hotel
 * @property string      $created_at
 * @property string      $updated_at
 *
 * @property HotelRoom[] $hotelRooms
 */
class Hotel extends BaseHotel
{
    /**
     * {@inheritdoc}
     * @return \backend\models\hotel\query\HotelQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new HotelQuery(get_called_class());
    }
}
