<?php


namespace backend\helpers;

use backend\models\hotel\Hotel;
use yii\helpers\ArrayHelper;

/**
 * Class HelperHotel
 */
class HelperHotel
{
    /**
     * @return array
     */
    public static function getDropdownList()
    {
        return ArrayHelper::map(Hotel::find()->all(), 'id', 'title');
    }
}