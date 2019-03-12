<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Groups;
use app\models\Students;
use yii\helpers\ArrayHelper;
use bootui\datetimepicker\Timepicker;

/* @var $this yii\web\View */
/* @var $model app\models\EventsGroupVisits */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="card-body">

    <?php $form = ActiveForm::begin([
        'id' => 'event-form',


    ]); ?>

    <?= $form->field($model, 'color')->dropDownList(ArrayHelper::map([
            ['id' => 'LightSkyBlue', 'color' => 'LightSkyBlue'],
            ['id' => 'BlueViolet', 'color' => 'BlueViolet'],
            ['id' => 'DarkRed', 'color' => 'DarkRed'],
            ['id' => 'DarkMagenta', 'color' => 'DarkMagenta'],
            ['id' => 'SaddleBrown', 'color' => 'SaddleBrown'],
            ['id' => 'DarkSeaGreen', 'color' => 'DarkSeaGreen'],
            ['id' => 'LightGreen', 'color' => 'LightGreen'],
            ['id' => 'MediumPurple', 'color' => 'MediumPurple'],
            ['id' => 'DarkViolet', 'color' => 'DarkViolet'],
            ['id' => 'PaleGreen', 'color' => 'PaleGreen'],
            ['id' => 'DarkOrchid', 'color' => 'DarkOrchid'],
            ['id' => 'YellowGreen', 'color' => 'YellowGreen'],
            ['id' => 'Sienna', 'color' => 'Sienna'],
            ['id' => 'Brown', 'color' => 'Brown'],
            ['id' => 'DarkGray', 'color' => 'DarkGray'],
            ['id' => 'LightBlue', 'color' => 'LightBlue'],
            ['id' => 'GreenYellow', 'color' => 'GreenYellow'],
            ['id' => 'PaleTurquoise', 'color' => 'PaleTurquoise'],
            ['id' => 'LightSteelBlue', 'color' => 'LightSteelBlue'],
            ['id' => 'PowderBlue', 'color' => 'PowderBlue'],
            ['id' => 'FireBrick', 'color' => 'FireBrick'],
            ['id' => 'DarkGoldenRod', 'color' => 'DarkGoldenRod'],
            ['id' => 'MediumOrchid', 'color' => 'MediumOrchid'],
            ['id' => 'RosyBrown', 'color' => 'RosyBrown'],
            ['id' => 'DarkKhaki', 'color' => 'DarkKhaki'],
            ['id' => 'Silver', 'color' => 'Silver'],
            ['id' => 'MediumVioletRed', 'color' => 'MediumVioletRed'],
            ['id' => 'IndianRed', 'color' => 'IndianRed'],
            ['id' => 'Peru', 'color' => 'Peru'],
            ['id' => 'Chocolate', 'color' => 'Chocolate'],
            ['id' => 'Tan', 'color' => 'Tan'],
            ['id' => 'LightGray', 'color' => 'LightGray'],
            ['id' => 'PaleVioletRed', 'color' => 'PaleVioletRed'],
            ['id' => 'Thistle', 'color' => 'Thistle'],
            ['id' => 'Orchid', 'color' => 'Orchid'],
            ['id' => 'GoldenRod', 'color' => 'GoldenRod'],
            ['id' => 'Crimson', 'color' => 'Crimson'],
        ]
        , 'id', 'color'),
        [
            'id' => "id_color",
            'class' => "form-control",

        ]); ?>


    <?= $form->field($model, 'group_id')->dropDownList(ArrayHelper::map(
        Groups::find()->where(['active' => true])->All()
        , 'id', 'title'),

        [
            'id' => "id_group",
            'class' => "form-control",
            'prompt' => 'Выберите группу ',
            'class' => "form-control",
            'disabled' => $model->isNewRecord ? false : true ,
            'onchange' => '
                $.post( "' . Yii::$app->urlManager->createUrl('eventsGroupVisits/default/lists?id=') . '"+$(this).val(), function( data ) {

                $("#eventsgroupvisits-student_list").html( data );
            })',


        ]
    ); ?>

    <?=  $form->field($model, 'student_list')->checkboxList(
        ArrayHelper::map(
            $student_group
            , 'id', 'fio'),
        [


                'separator' => '<br>']
    )->label('Студенты');
    ?>


    <?= $form->field($model, 'date')->textInput() ?>



    <?= $form->field($model, 'time')->widget(Timepicker::className()); ?>


    <?= $form->field($model, 'status')->dropDownList(ArrayHelper::map([
            ['status' => 'По графику', 'text' => 'По графику'],
            ['status' => 'Перенесено', 'text' => 'Перенесено'],
        ]
        , 'status', 'text'),
        [
            'id' => "id_group",
            'class' => "form-control",
        ]); ?>



    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>


    <div class="modal-footer">
        <?= Html::submitButton('СОХРАНИТЬ', ['class' => 'btn btn-success btn-flat']) ?>
        <?= $model->isNewRecord ? null :  Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger btn-flat',
            'data' => [
                'confirm' => 'Вы точно хотите удалить?',
                'method' => 'post',
            ],
        ]) ?>
        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Закрыть</button>

    </div>

    <?php ActiveForm::end(); ?>
</div>

