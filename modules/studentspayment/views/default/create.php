<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\StudentsPayment */

$this->title = 'Оплата занятий студента';
$this->params['breadcrumbs'][] = ['label' => 'Оплата занятий студента', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>


