<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\hotel\form\OrderForm;
use kartik\daterange\DateRangePicker;
use yii\widgets\MaskedInput;

/**
 * @var OrderForm $formModel
 * @var \frontend\models\hotel\Hotel $model
 */
?>

<div class="row">
    <div class="col-lg-12">
        <?php

        $form = ActiveForm::begin(
            [
                'action' => \yii\helpers\Url::to(['/hotel/view', 'hotelId' => $model->id]),
                'enableAjaxValidation' => true,
                'id' => 'order-form',
                'options' => ['class' => 'form form-horizontal', 'style' => "padding: 15px"],
            ]
        ) ?>

        <?= $form->field($formModel, 'roomId', ['template' => '{label}{input}{error}'])->dropDownList(
            \yii\helpers\ArrayHelper::map(
                \backend\models\hotel\HotelRoom::findAll(['hotel_id' => $formModel->hotelId]),
                'id',
                'number'
            )
        ) ?>
        <?= $form->field($formModel, 'username', ['template' => '{label}{input}{error}']) ?>
        <?= $form->field($formModel, 'phone', ['template' => '{label}{input}{error}'])->widget(
            MaskedInput::class,
            [
                'mask' => '99999999999',
            ]
        ) ?>
        <div class="form-group field-orderform-datetimeRange">
            <label>Выберита даты брони</label>
            <?= DateRangePicker::widget(
                [
                    'model' => $formModel,
                    'attribute' => 'datetimeRange',
                    'convertFormat' => true,
                    'startAttribute' => 'bookedDateFrom',
                    'endAttribute' => 'bookedDateTo',
                    'pluginOptions' => [
                        'timePicker' => false,
                        'locale' => [
                            'format' => 'Y-m-d',
                        ],
                        'minDate' => date('Y-m-d'),
                    ],
                ]
            ); ?>
        </div>

        <?= $form->field($formModel, 'hotelId')->hiddenInput(['value' => $formModel->hotelId])->label(false) ?>
        <div class="form-group">
            <div class="col-lg-11">
                <?= Html::submitButton('Бронировать', ['class' => 'btn btn-block btn-primary']) ?>
            </div>
        </div>
        <?php ActiveForm::end() ?>
    </div>
</div>