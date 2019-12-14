<?php
/* @var $this yii\web\View */

/* @var $listHotel \frontend\models\hotel\Hotel[] */
$this->title = 'Список номеров';

?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Список отелей</h1>
        <p class="lead">Забронируйте номер гостиницы прямо сейчас</p>
    </div>
    <?php if (Yii::$app->session->getFlash('order')) : ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            <?= Yii::$app->session->getFlash('order', Yii::t('app', 'Заказ принят'), true); ?>
        </div>
    <?php endif; ?>
    <div class="body-content">
        <div class="row">
            <div class="col-lg-4">
                <h2>Выберите отель</h2>
                <ul>
                    <?php foreach ($listHotel as $item): ?>
                        <li>
                            <?= \yii\helpers\Html::a(
                                $item->title,
                                \yii\helpers\Url::to(['hotel/view', 'hotelId' => $item->id])
                            ) ?>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>
            <div class="col-lg-8">
                <h3>Широкий выбор отелей</h3>
                <?php foreach ($listHotel as $item): ?>
                    <div class="panel panel-default">
                        <div class="panel-heading"><?= $item->title ?></div>
                        <div class="panel-body">
                            <?= $item->short_description ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
