<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper ;
/* @var $this yii\web\View */
/* @var $searchModel app\models\StudentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Оплата занятий';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?=$this->title?></h3>

                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <?= Html::a('СОЗДАТЬ', ['create'], ['class' => 'btn btn-block btn-success btn-flat float-right',
                            'style'=>'width: 150px;']) ?>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'summary' => false,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        [
                            'attribute' => 'id_course',
                            'format' => 'raw',
                            'filter' =>  ArrayHelper::map(
                                app\models\Courses::find()->select(['id', 'title'])
                                    ->where(['active'=>true])
                                    ->all()
                                ,'id','title'),
                            'value' => function ($model, $key, $index, $column) {
                                return $model->course->title;
                            },
                        ],

                        [
                            'attribute' => 'id_group',
                            'format' => 'raw',
                            'filter' =>  ArrayHelper::map(
                                app\models\Groups::find()->select(['id', 'title'])
                                    ->where(['active'=>true])
                                    ->all()
                                ,'id','title'),
                            // 'value' => 'group.title'
                            'value' => function ($model, $key, $index, $column) {
                                return $model->group->title;
                            },
                        ],
                        [
                            'attribute' => 'id_student',
                            'format' => 'raw',
                            'filter' =>  ArrayHelper::map(
                                app\models\Students::find()->select(['id','CONCAT(first_name,\' \',middle_name,\' \',last_name) as first_name'])
                                    ->where(['active'=>true])
                                    ->all()
                                ,'id','first_name'),
                            // 'value' => 'group.title'
                            'value' => function ($model, $key, $index, $column) {
                                return $model->student->first_name. ' '. $model->student->middle_name. ' '.$model->student->last_name ;
                            },
                        ],


                        'price',
                        'date',
                        'count',


                        [
                            'attribute' => 'status',
                            'format' => 'raw',
                            'filter' =>  ArrayHelper::map(
                              [
                                  ['id'=>0,'title'=>'НЕТ'],
                                  ['id'=>1,'title'=>'ДА'],
                              ]
                                ,'id','title'),

                            'value' => function ($model, $key, $index, $column) {

                               //return ($model->status)?'<span class="right badge badge-success">ДА</span>':'<span class="right badge badge-danger">НЕТ</span>';
                                 return ($model->status)?'<span style="margin: 20%; padding: 10px; font-size: 20px; font-weight:500;" class=" badge badge-success">ДА</span>':'<span style="margin: 20%; padding: 10px; font-size: 20px; font-weight:500;" class=" badge badge-danger">НЕТ</span>';

                            },
                        ],



                        [
                            'class' => 'yii\grid\ActionColumn',
                            'template' =>  '<div style="display:flex;">{view} {update} {delete} {link} </div>',
                            'buttons' => [
                               /* 'view' => function ($url,$model) {
                                    return Html::a(
                                        '<button type="button"  class="btn btn-block btn-warning btn-sm btn-flat">СМОТРЕТЬ</button>',
                                        $url);
                                },*/
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

