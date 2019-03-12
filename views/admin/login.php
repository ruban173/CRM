<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Авторизация';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container" style="padding-top:100px;">
    <div class="row">
        <div class="col-sm-4 offset-sm-4">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Авторизация</h3>
                </div>
                <?php $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'layout' => 'horizontal',
                    'options' => ['class' => 'form-horizontal'],
                    'fieldConfig' => [
                        /*   'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",*/
                        'labelOptions' => ['class' => ''],
                    ],
                ]); ?>
                <div class="card-body">
                    <?= $form->field($model, 'username', [
                        'template' => ' <div class="form-group">
                            <label for="inputEmail3" class="col-sm-12 control-label">{label}</label>
                            <div class="col-sm-12">
                           {input}{error}
                            </div>
                        </div> '
                    ])->label('Логин'); ?>

                    <?= $form->field($model, 'password', [
                        'template' => ' <div class="form-group">
                            <label for="inputEmail3" class="col-sm-12 control-label">{label}</label>
                            <div class="col-sm-12">
                           {input} {error}
                            </div>
                        </div> '
                    ])->passwordInput()->label('Пароль'); ?>
                    <?= $form->field($model, 'rememberMe', [
                        'template' => ' <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <div class="form-check">
                                   {input}
                                    <label class="form-check-label" for="exampleCheck2">{label}</label>
                                </div>
                            </div>
                        </div>'])->checkbox()->label('Запомнить') ?>
                </div>
                <div class="card-footer">
                    <?= Html::submitButton('Войти', ['class' => 'btn btn-info float-right', 'name' => 'login-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>







