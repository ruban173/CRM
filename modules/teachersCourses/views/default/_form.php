<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Groups;

/* @var $this yii\web\View */
/* @var $model app\models\Teachers */
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
    <?= Html::a('К списку', ['/teachersCourses'], [
        'class' => 'btn btn-success btn-flat'
    ]) ?>
</p>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"><?= Html::encode($this->title) ?></h3>
    </div>
    <div class="card-body">
    <?php $form = ActiveForm::begin(); ?>
        <?=$form->field($model, 'id_courses')->dropDownList( ArrayHelper::map(
            app\models\Courses::find()
                ->where(['active'=>true])
                ->all()
            ,'id','title'),
            [
                'prompt' => 'Выберите курс обучения',
                'id'=>"courses",
                'class'=>"form-control",
                'onchange' => '
                $.post( "'.Yii::$app->urlManager->createUrl('teachersCourses/default/lists?id=').'"+$(this).val(), function( data ) {
              
     //alert();
      $("#id_group").html( data );
     })'
            ]);?>



        <?=$form->field($model, 'id_group')->dropDownList( $group
            ,
            [
                'id'=>"id_group",
                'class'=>"form-control",
            ]);?>

        <?=$form->field($model, 'id_teachers')->dropDownList( ArrayHelper::map(
            app\models\Teachers::find()->select(['id, CONCAT (first_name ,\' \', middle_name,\' \', last_name) as first_name '])
                ->where(['active'=>true])
                ->all()
            ,'id','first_name'),
            [
                'prompt' => 'Выберите преподавателя',
                'id'=>"courses",
                'class'=>"form-control",

            ]);?>
        <?= $form->field($model, 'price') ?>


        <div class="form-group">
            <?= Html::submitButton('СОХРАНИТЬ', ['class' => 'btn btn-success btn-flat']) ?>
        </div>

    </div>
    <?php ActiveForm::end(); ?>
</div>