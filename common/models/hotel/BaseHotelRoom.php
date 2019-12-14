<?php


namespace common\models\hotel;

use Yii;
use backend\models\hotel\Hotel;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * Class BaseHotelRoom
 */
class BaseHotelRoom extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%hotel_room}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hotel_id', 'number'], 'required'],
            [['hotel_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['number'], 'string', 'max' => 255],
            [
                ['hotel_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Hotel::class,
                'targetAttribute' => ['hotel_id' => 'id'],
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
            'hotel_id' => Yii::t('app', 'Hotel ID'),
            'number' => Yii::t('app', 'Number'),
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
    public function getHotel()
    {
        return $this->hasOne(Hotel::class, ['id' => 'hotel_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(BaseOrder::class, ['room_id' => 'id']);
    }
}