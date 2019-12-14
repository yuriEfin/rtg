<?php


namespace common\models\hotel;

use Yii;
use backend\models\hotel\HotelRoom;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "{{%order}}".
 *
 * @property int                              $id
 * @property string                           $room_id          Hotel room id
 * @property string                           $hotel_id         Hotel id
 * @property string                           $username         Username
 * @property int                              $phone            Phone
 * @property string                           $booked_date_from Booked date
 * @property string                           $booked_date_to   Booked date
 * @property string                           $created_at       Created at
 * @property string                           $updated_at       Updated at
 *
 * @property \frontend\models\hotel\HotelRoom $room
 */
class BaseOrder extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%order}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['room_id', 'username', 'phone', 'booked_date_from', 'booked_date_to'], 'required'],
            [['room_id', 'hotel_id', 'phone'], 'integer'],
            [['booked_date_to', 'booked_date_from'], 'date', 'format' => 'php:Y-m-d'],
            [['created_at', 'updated_at'], 'safe'],
            [['username'], 'string', 'max' => 255],
            [
                ['room_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => HotelRoom::class,
                'targetAttribute' => ['room_id' => 'id'],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'room_id' => Yii::t('app', 'Order room id'),
            'username' => Yii::t('app', 'Username'),
            'phone' => Yii::t('app', 'Phone'),
            'booked_date_from' => Yii::t('app', 'Booked Date From'),
            'booked_date_to' => Yii::t('app', 'Booked Date To'),
            'created_at' => Yii::t('app', 'Created at'),
            'updated_at' => Yii::t('app', 'Updated at'),
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class => [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoom()
    {
        return $this->hasOne(BaseHotelRoom::class, ['id' => 'room_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHotel()
    {
        return $this->hasOne(BaseHotel::class, ['id' => 'hotel_id']);
    }
}
