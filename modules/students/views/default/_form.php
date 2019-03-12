<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Groups;
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
    <?= Html::a('К списку', ['/students'], [
        'class' => 'btn btn-success btn-flat'
    ]) ?>
</p>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"><?= Html::encode($this->title) ?></h3>
    </div>
    <div class="card-body">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'middle_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parentFIO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'birthday')->widget(\yii\jui\DatePicker::class, [
        'language' => 'ru',
        'model' => $model,
        'value'  => function(){
                return ($model->birthday==='0000-00-00')? '': $model->birthday;

        },
        'attribute' => 'birthday',
        'options' => ['class' => 'form-control'],
        'dateFormat' => 'yyyy-MM-dd',
        'clientOptions' => [
            'todayHighlight' => true,
             'yearRange' => '1956:2018',
             'changeMonth' => 'true',
             'changeYear' => 'true',
           // 'firstDay' => '1',
        ]
    ]) ?>


        <?=$form->field($model, 'group_id')->dropDownList( ArrayHelper::map(
            Groups::find()
                ->where(['active'=>true])
                ->all()
            ,'id','title'),[
                    'id'=>"groups",
            'class'=>"form-control",
            'multiple'=>'multiple',
           'prompt'=>'Нет группы',


        ]);?>



    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'adress')->textarea(['rows' => 3]) ?>

        <div class="form-group">
            <?= Html::submitButton('СОХРАНИТЬ', ['class' => 'btn btn-success btn-flat']) ?>
        </div>

    </div>
    <?php ActiveForm::end(); ?>
</div>