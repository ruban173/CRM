<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Groups;
use app\models\Courses;
use app\models\Students;
use yii\helpers\ArrayHelper ;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Students */
/* @var $form yii\widgets\ActiveForm */
?>
<p>

    <?= $model->isNewRecord ? null :  Html::a('Удалить', ['delete', 'id' => $model->id], [
        'class' => 'btn btn-danger btn-flat',
        'data' => [
            'confirm' => 'Вы точно хотите удалить?',
            'method' => 'post',
        ],
    ]) ?>
    <?= Html::a('К списку', ['/studentspayment'], [
        'class' => 'btn btn-success btn-flat'
    ]) ?>
</p>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"><?= Html::encode($this->title) ?></h3>
    </div>
    <div class="card-body">

        <?php $form = ActiveForm::begin(); ?>

        <?=$form->field($model, 'id_course')->dropDownList( ArrayHelper::map(
            Courses::find()
                ->where(['active'=>true])
                ->all()
            ,'id','title'),[
            'id'=>"id_course",
            'class'=>"form-control",
            'prompt'=>'-----------',
            'onchange' => '
                $.post( "' . Yii::$app->urlManager->createUrl('studentspayment/default/listsgroup?id=') . '"+$(this).val(), function( data ) {

                $("#id_group").html( data ); 
              
                $("#id_student").html(new Option("-----------", "") );
               
               
            })',


        ]);?>
        <?= $form->field($model, 'id_group')->dropDownList(ArrayHelper::map(
            Groups::find()->where(['active' => true])->All()
            , 'id', 'title'),

            [
                'id' => "id_group",
                'class' => "form-control",
                'prompt' => '-----------',
                'class' => "form-control",
               // 'disabled' => $model->isNewRecord ? false : true ,
                'onchange' => '
                $.post( "' . Yii::$app->urlManager->createUrl('studentspayment/default/liststudent?id=') . '"+$(this).val(), function( data ) {

                $("#id_student").html( data );
            })',


            ]
        ); ?>
        <?=$form->field($model, 'id_student')->dropDownList( ArrayHelper::map(
            Students::find()->select(['id','CONCAT(first_name,\' \',middle_name,\' \',last_name) as first_name'])
                ->where(['active'=>true])
                ->all()
            ,'id','first_name'),[
            'id'=>"id_student",
            'class'=>"form-control",
             'prompt'=>'-----------',


        ]);?>


        <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>


        <?= $form->field($model, 'count')->textInput() ?>

        <?= $form->field($model, 'status')->checkbox() ?>

        <?=$form->field($model, 'type')->dropDownList(
            ArrayHelper::map(
            [
                ['val'=>'Наличный','view'=>'Наличный'],
                ['val'=>'Безналичный','view'=>'Безналичный']
            ]
            ,'val','view'),[
            'id'=>"type",
            'class'=>"form-control",



        ]);?>

        <?= $form->field($model, 'date')->widget(\yii\jui\DatePicker::class, [
            'language' => 'ru',
            'model' => $model,
            'value'  => function(){
                return ($model->date==='0000-00-00')? '': $model->date;

            },
            'attribute' => 'date',
            'options' => ['class' => 'form-control'],
            'dateFormat' => 'yyyy-MM-dd',
            'clientOptions' => [
                'todayHighlight' => true,
              //  'yearRange' => '1956:2018',
                'changeMonth' => 'true',
                'changeYear' => 'true',
                // 'firstDay' => '1',
            ]
        ]) ?>





        <div class="form-group">
            <?= Html::submitButton('СОХРАНИТЬ', ['class' => 'btn btn-success btn-flat']) ?>
        </div>

    </div>
    <?php ActiveForm::end(); ?>
</div>
