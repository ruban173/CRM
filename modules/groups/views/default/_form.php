<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper ;

/* @var $this yii\web\View */
/* @var $model app\models\Groups */
/* @var $form yii\widgets\ActiveForm */
?>

<?= $model->isNewRecord ? null :  Html::a('Удалить', ['delete', 'id' => $model->id], [
    'class' => 'btn btn-danger btn-flat',
    'data' => [
        'confirm' => 'Вы точно хотите удалить?',
        'method' => 'post',
    ],
]) ?>
<?= Html::a('К списку', ['/groups'], [
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
            ,'id','title'),['id'=>"courses", 'class'=>"form-control"]);?>



    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>




    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>



        <div class="form-group">
            <?= Html::submitButton('СОХРАНИТЬ', ['class' => 'btn btn-success btn-flat']) ?>
        </div>

    </div>
    <?php ActiveForm::end(); ?>
</div>