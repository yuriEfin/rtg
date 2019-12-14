<?php
$this->params['breadcrumbs'][] = [
    'template' => "<li><b>{link}</b></li>\n",
    'label' => Yii::t('app', 'Hotels'),
    'url' => ['/hotel']
];
$this->params['breadcrumbs'][] = [
    'label' => $model->title,
];
?>
<div class="row">
    <div class="col-lg-12"></div>
</div>
<div class="row">
    <div class="col-lg-12">
        <h1>Отель <?= $model->title ?></h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <h2>Описание отеля</h2>
        <div class="panel panel-default">
            <div class="panel-heading"><?= $model->title ?></div>
            <div class="panel-body">
                <?= $model->short_description ?>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">Бронирование номера в отеле <?= $model->title ?></div>
            <div class="panel-body">
                <?= $this->render('_order_form', ['formModel' => $formModel, 'model' => $model]) ?>
            </div>
        </div>
    </div>
</div>
