<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EventsGroupVisits */

$this->title = 'Create Events Group Visits';
$this->params['breadcrumbs'][] = ['label' => 'Events Group Visits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="events-group-visits-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
