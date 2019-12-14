<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\hotel\HotelRoom */
/* @var $listHotel array */

$this->title = Yii::t('app', 'Create Hotel Room');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Hotel Rooms'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hotel-room-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'listHotel' => $listHotel,
    ]) ?>

</div>
