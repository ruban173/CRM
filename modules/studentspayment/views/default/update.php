<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StudentsPayment */

$this->title = 'Обновление: ' ;
$this->params['breadcrumbs'][] = ['label' => 'Оплата занятий студента', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновление';
?>


    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>


