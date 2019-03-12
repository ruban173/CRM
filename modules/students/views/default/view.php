<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Students */

$this->title = 'Посещение занятий';
$this->params['breadcrumbs'][] = ['label' => 'Студенты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-info">
                <h3 class="card-title ">
                    <i class="fa fa-address-book-o "></i>
                  ПОСЕЩАЕМОСТЬ
                </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <dl>
                    <dt>ВСЕГО ЗАНЯТИЙ </dt>
                    <dd class="text-bold text-lg "><?=$lesson['count']?></dd>
                    <dt>ПОСЕТИЛ(а)</dt>
                    <dd class="text-bold text-lg text-success"><?=$lesson['visit']?></dd>
                    <dt>ПРОПУСТИЛ(а)</dt>
                    <dd class="text-bold text-md text-danger">ВСЕГО: <?=$lesson['absence_all']?></dd>
                    <dd class="text-bold text-md text-danger">НЕУВАЖИТЕЛЬНЫЕ: <?=$lesson['absence_false']?></dd>

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
                    <dd class="text-bold text-lg text-success "><?=$lesson['balans']['count']?> заятий, <?=$lesson['balans']['price']?> р.  </dd>
                    <dt> Выписан счет </dt>
                    <dd class="text-bold text-lg text-info ">
                        <?=$lesson['balans_buff']['count']?> заятий, <?=$lesson['balans_buff']['price']?> р.  </dd>

                    <hr>
                    <dt> ОСТАТОК ОПЛАЧЕННЫХ ЗАНЯТИЙ </dt>
                    <?
                    $summ=$lesson['balans']['count'] -$lesson['visit']-$lesson['absence_false'];
                    if ($summ<0) $class='text-danger';
                             else $class='text-success';
                             echo '   <dd class="text-bold text-lg '.$class.' ">'.$summ.'</dd>'
                    ?>

                </dl>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- ./col -->
</div>
<div class="col-xs-12">
    <div class="card card-primary">

        <!-- THE CALENDAR -->
        <?
        echo  yii2fullcalendar\yii2fullcalendar::widget([
            'options' => [
                'lang' => 'ru',

                //... more options to be defined here!
            ],
            'clientOptions' => [
                'id' => 'calendar',
                // 'allDaySlot' => false,
                //    'selectHelper' => true,
            //    'eventClick' => new JsExpression($JSEventClick),
              //  'dayClick' => new JsExpression($JSDayClick),
                //   'eventMouseover' =>new JsExpression($JSDayMouseover),
                //   'eventMouseout' =>new JsExpression($JSDayMouseout),
                //   'defaultView' => 'agendaWeek',
                //  'firstDay' => date('w'),  // Sunday=0, Monday=1, Tuesday=2, etc.
                //   'header' => [
                //      'center'=>'prev,next today',
                //     'left'=>'',
                //      'right'=>'agendaDay,agendaWeek,month',
                //   ],
            ],
            'events' =>$events,

        ]);
        ?>

        <!-- /.card-body -->
    </div>
    <!-- /. box -->
</div>
