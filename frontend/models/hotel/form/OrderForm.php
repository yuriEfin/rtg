<?php


namespace frontend\models\hotel\form;

use Yii;
use yii\validators\DateValidator;

/**
 * Class OrderForm
 */
class OrderForm extends \yii\base\Model
{
    /**
     * @var string|null
     */
    public $username;
    /**
     * @var integer
     */
    public $hotelId;
    /**
     * @var integer
     */
    public $roomId;
    /**
     * @var integer|null
     */
    public $phone;
    /**
     * @var string
     */
    public $bookedDateFrom;
    /**
     * @var string
     */
    public $bookedDateTo;
    /**
     * @var
     */
    public $datetimeRange;

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'hotelId' => Yii::t('app', 'Hotel Id'),
            'roomId' => Yii::t('app', 'Room Id'),
            'username' => Yii::t('app', 'Username'),
            'phone' => Yii::t('app', 'Phone'),
            'bookedDateFrom' => Yii::t('app', 'Date range from'),
            'bookedDateTo' => Yii::t('app', 'Date range to'),
            'datetimeRange' => Yii::t('app', 'Date range'),
        ];
    }

    public function rules()
    {
        return [
            [['username', 'phone', 'datetimeRange'], 'string'],
            [
                ['bookedDateFrom', 'bookedDateTo'],
                DateValidator::TYPE_DATE,
                'format' => 'yyyy-MM-dd',
            ],
            [['username', 'phone', 'hotelId', 'roomId', 'bookedDateFrom', 'bookedDateTo', 'datetimeRange'], 'safe'],
        ];
    }
}