<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TeachersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Назначение курсов';
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
                <?php Pjax::begin(); ?>
                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => false,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          //  'id_teachers',
          //  'id_courses',
         /* 'group.title',*/
            [
                'label'=>'Курс',
                'attribute'=>'id_courses',
                'value'=> 'courses.title',
                'filter' => ArrayHelper::map(
                app\models\Courses::find()->select(['id', 'title'])
                    ->where(['active'=>true])
                    ->all()
                ,'id','title'),
                'format' => 'text',
            ],
            [
                'attribute'=>'id_group',
                'label'=>'Группа',
                // 'format'=>'text', // Возможные варианты: raw, html
                'value' => 'group.title',
                'filter' => ArrayHelper::map(
                    app\models\Groups::find()->select(['id', 'title'])
                        ->where(['active'=>true])
                        ->all()
                    ,'id','title')
            ],

            [
                'label'=>'Преподаватель',
                'attribute'=>'id_teachers',
                'value'=> function($model) {

                    return $model->teachers->first_name.' '.$model->teachers->middle_name.' '.$model->teachers->last_name.' ' ;
                },
                'filter' => ArrayHelper::map(
                    app\models\Teachers::find()->select(['id, CONCAT (first_name ,\' \', middle_name,\' \', last_name) as first_name '])
                        ->where(['active'=>true])
                        ->all()
                    ,'id','first_name'),
                'format' => 'text',
            ],
            'price',
            'date_up',

            //'active:boolean',
            //'autor',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' =>  '<div style="display:flex;">{view} {update} {delete} {link} </div>',
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
    <?php Pjax::end(); ?>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
