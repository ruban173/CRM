<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Teachers */

$this->title = 'Назначить курс';
$this->params['breadcrumbs'][] = ['label' => 'Назначение курсов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teachers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'group' =>$group ,
    ]) ?>

</div>
