<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\hotel\HotelRoom */
/* @var $form yii\widgets\ActiveForm */
/* @var $listHotel array */
?>

<div class="hotel-room-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'hotel_id')->dropDownList($listHotel, ['prompt' => 'Выберите отель']) ?>

    <?= $form->field($model, 'number')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
