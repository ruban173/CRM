<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Teachers */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Преподаватели', 'url' => ['index']];
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
    <?= Html::a('К списку', ['/teachers'], [
        'class' => 'btn btn-success btn-flat'
    ]) ?>
</p>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-info">
                <h3 class="card-title ">
                    <i class="fa fa-address-book-o "></i>
                    ПОКАЗАТЕЛИ
                </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <dl>
                    <dt>ВСЕГО ПРОВЕДЕНО ЗАНЯТИЙ </dt>
                    <dd class="text-bold text-lg "><?=$teacher['count']?></dd>
                    <dt>ЗАРАБОТАНО</dt>
                    <dd class="text-bold text-lg text-success"><?=$teacher['payall']?></dd>
                    <dt>ВЫПЛАЧЕНО</dt>
                    <dd class="text-bold text-md text-success">ВСЕГО: <?=$teacher['payoff']?></dd>

                </dl>


            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- ./col -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-success">
                <h3 class="card-title">
                    <i class="fa  fa-rub"></i>
                    ОПЛАТА
                </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body clearfix">
                <dl>
                    <dt>ОПЛАЧЕНО</dt>
                    <dd class="text-bold text-lg text-success ">0</dd>
                    <dt> ОСТАТОК</dt>
                    <dd class="text-bold text-lg text-success">0</dd>
                </dl>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- ./col -->
</div>