<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EventsGroupVisitsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Events Group Visits';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="events-group-visits-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Events Group Visits', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'group_id',
            'description',
            'date',
            'time',
            //'date_up',
            //'status',
            //'active:boolean',
            //'autor',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
