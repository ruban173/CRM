<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Teachers */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Назначение курсов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<p>
    <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-flat']) ?>
    <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
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
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?= $this->title ?></h3>

                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <?= Html::a('СОЗДАТЬ', ['create'], ['class' => 'btn btn-block btn-success btn-flat float-right',
                            'style' => 'width: 150px;']) ?>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_teachers',
            'id_courses',
            'price',
            'date_up',
            'date_up',
            'active:boolean',

        ],
    ]) ?>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>