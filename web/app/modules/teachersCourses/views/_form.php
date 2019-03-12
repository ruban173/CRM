<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TeachersCourses */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="teachers-courses-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_teachers')->textInput() ?>

    <?= $form->field($model, 'id_courses')->textInput() ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'date_up')->textInput() ?>

    <?= $form->field($model, 'autor')->textInput() ?>

    <?= $form->field($model, 'active')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
