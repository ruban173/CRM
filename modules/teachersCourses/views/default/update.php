<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Teachers */

$this->title = 'Обновить: ' ;
$this->params['breadcrumbs'][] = ['label' => 'Преподаватели', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>

    <?= $this->render('_form', [
        'model' => $model,
        'group' =>$group ,
    ]) ?>


