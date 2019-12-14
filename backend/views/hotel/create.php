<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\hotel\Hotel */

$this->title = Yii::t('app', 'Create Hotel');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Hotels'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hotel-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
