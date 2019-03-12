<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper ;
/* @var $this yii\web\View */
/* @var $searchModel app\models\StudentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Студенты';
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

            'first_name',
           // 'middle_name',
            'last_name',
          [

                'attribute' => 'group_id',

                'format' => 'raw',

                'filter' =>  ArrayHelper::map(
                    app\models\Groups::find()->select(['id', 'title'])
                        ->where(['active'=>true])
                        ->all()
                    ,'id','title'),

                'value' => function ($model, $key, $index, $column) {


                    $val=[];
                    foreach ($model->groups_select as $group)$val[]=$group->id_group .'<br>';
                    $gp=null;
                   foreach (\app\models\Groups::findAll($val) as $group){
                        $gp.=$group->title .'<br>';
                    }

                    return $gp;
                },
            ],




           // 'birthday',
         /*   [
                'attribute'=>'group_id',
                'label'=>'Группа',
                // 'format'=>'text', // Возможные варианты: raw, html
                'value' => 'group.title',
                'filter' => ArrayHelper::map(
                    app\models\Groups::find()->select(['id', 'title'])
                        ->where(['active'=>true])
                        ->all()
                    ,'id','title')
            ],*/




            //'date_up',
            'status',
            //'active:boolean',
            //'phone',
            //'email:email',
            //'adress:ntext',
            //'autor',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' =>  '<div style="display:flex;">{view} {update} {delete} {link} {payment}</div>',
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

                    'payment' => function ($url,$model) {
                        return Html::a(
                            '<button type="button" class="btn btn-block btn-success btn-sm btn-flat">Оплата</button>',
                            $url);
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
