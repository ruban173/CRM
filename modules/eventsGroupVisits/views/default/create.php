<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EventsGroupVisits */

$this->title = 'Создать событие';
$this->params['breadcrumbs'][] = ['label' => 'Events Group Visits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<h2><?= Html::encode($this->title) ?></h2>

<?= $this->render('_form', [
    'model' => $model,
    'student_group' => $student_group,

]) ?>


