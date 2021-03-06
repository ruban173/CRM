<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper ;

/* @var $this yii\web\View */
/* @var $model app\models\Courses */

$this->title = 'Группы';
$this->params['breadcrumbs'][] = ['label' => 'Курсы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>



<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?=$course?></h3>

                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <?= Html::a('СОЗДАТЬ', ['create'], ['class' => 'btn btn-block btn-success btn-flat float-right',
                            'style'=>'width: 150px;']) ?>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    //   'filterModel' => $searchModel,
                    'summary' => false,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'title',
                        'description',
                        'status',
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'template' =>  '<div style="display:flex;">{view} {update} {delete} {link} </div>',
                            'controller' => '/groups/default',
                            'buttons' => [
                                'view' => function ($url,$model) {
                                    return Html::a(
                                        '<button type="button"  class="btn btn-block btn-warning btn-sm btn-flat">СМОТРЕТЬ</button>',
                                        $url);
                                },
                                'update' => function ($url,$model) {
                                    return Html::a(
                                        '<button type="button" class="btn btn-block btn-primary  btn-sm btn-flat">ОБНОВИТЬ</button>',
                                        $url);
                                },
                                'delete' => function ($url,$model) {
                                    return Html::a('УДАЛИТЬ', ['delete', 'id' => $model->id], [
                                        'class' => 'btn btn-block btn-danger btn-sm btn-flat',
                                        'data' => [
                                            'confirm' => 'Вы действительно хотите удалить?',
                                            'method' => 'post',
                                        ],
                                    ]);
                                },
                            ],
                        ],
                    ],
                ]); ?>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>

