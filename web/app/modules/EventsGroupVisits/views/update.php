<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EventsGroupVisits */

$this->title = 'Update Events Group Visits: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Events Group Visits', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="events-group-visits-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
