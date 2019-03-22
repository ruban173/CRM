<?php
use app\components\TablesWidget;

use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EventsGroupVisitsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Создать событие';
$this->params['breadcrumbs'][] = $this->title;
?>

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


<div class="col-xs-12">
    <div class="card card-primary">



<div class="box">
            <div class="box-header">       

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 300px; margin: 15px 10px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                  <h3 style="float: right;"> ГОД </h3>
                </div>
              </div>
            </div>
            <!-- /.box-header -->

<style type="text/css">
    table {
    width: 100%;
}
th {
    background-color: #0074d9;
    color: #fff;
    position: absolute;
    left: 0;
    width: 200px;
   /* height: 100%; */
}
.outer {
    position: relative
}
.inner {
    overflow-x: scroll;
    overflow-y: visible;
    /*width: 400px;*/
    margin-left: 200px;
}
</style>
 

<div class="outer">
    <div class="inner ">

         <?=TablesWidget::widget()?>


    <!--    <table class="table table-bordered">
            <tbody>
                <tr>
                    <th>Lorem ipsum.</th>
                    <td>Inventore, at.</td>
                    <td>Facilis, voluptatum.</td>
                    <td>Laboriosam, voluptatibus.</td>
                    <td>Voluptatibus, eaque!</td>
                    <td>Molestiae, cupiditate!</td>
                    <td>Vel, odio.</td>
                    <td>Maxime, dicta.</td>
                    <td>Modi, laboriosam.</td>
                    <td>Pariatur, non.</td>
                     <td>Inventore, at.</td>
                    <td>Facilis, voluptatum.</td>
                    <td>Laboriosam, voluptatibus.</td>
                    <td>Voluptatibus, eaque!</td>
                    <td>Molestiae, cupiditate!</td>
                    <td>Vel, odio.</td>
                    <td>Maxime, dicta.</td>
                    <td>Modi, laboriosam.</td>
                    <td>Pariatur, non.</td> <td>Inventore, at.</td>
                    <td>Facilis, voluptatum.</td>
                    <td>Laboriosam, voluptatibus.</td>
                    <td>Voluptatibus, eaque!</td>
                    <td>Molestiae, cupiditate!</td>
                    <td>Vel, odio.</td>
                    <td>Maxime, dicta.</td>
                    <td>Modi, laboriosam.</td>
                    <td>Pariatur, non.</td> <td>Inventore, at.</td>
                    <td>Facilis, voluptatum.</td>
                    <td>Laboriosam, voluptatibus.</td>
                    <td>Voluptatibus, eaque!</td>
                    <td>Molestiae, cupiditate!</td>
                    <td>Vel, odio.</td>
                    <td>Maxime, dicta.</td>
                    <td>Modi, laboriosam.</td>
                    <td>Pariatur, non.</td>
                </tr>
                <tr>
                    <th>Lorem ipsum.</th>
                    <td>Saepe, voluptas?</td>
                    <td>Doloribus, quidem.</td>
                    <td>Omnis, nam!</td>
                    <td>Culpa, ut.</td>
                    <td>Ex, est?</td>
                    <td>Suscipit, ab.</td>
                    <td>Ex, doloremque?</td>
                    <td>Cum, libero.</td>
                    <td>Officia, perspiciatis!</td>
                     <td>Inventore, at.</td>
                    <td>Facilis, voluptatum.</td>
                    <td>Laboriosam, voluptatibus.</td>
                    <td>Voluptatibus, eaque!</td>
                    <td>Molestiae, cupiditate!</td>
                    <td>Vel, odio.</td>
                    <td>Maxime, dicta.</td>
                    <td>Modi, laboriosam.</td>
                    <td>Pariatur, non.</td> <td>Inventore, at.</td>
                    <td>Facilis, voluptatum.</td>
                    <td>Laboriosam, voluptatibus.</td>
                    <td>Voluptatibus, eaque!</td>
                    <td>Molestiae, cupiditate!</td>
                    <td>Vel, odio.</td>
                    <td>Maxime, dicta.</td>
                    <td>Modi, laboriosam.</td>
                    <td>Pariatur, non.</td> <td>Inventore, at.</td>
                    <td>Facilis, voluptatum.</td>
                    <td>Laboriosam, voluptatibus.</td>
                    <td>Voluptatibus, eaque!</td>
                    <td>Molestiae, cupiditate!</td>
                    <td>Vel, odio.</td>
                    <td>Maxime, dicta.</td>
                    <td>Modi, laboriosam.</td>
                    <td>Pariatur, non.</td>
                </tr>
                <tr>
                    <th>Lorem ipsum.</th>
                    <td>Inventore, at.</td>
                    <td>Facilis, voluptatum.</td>
                    <td>Laboriosam, voluptatibus.</td>
                    <td>Voluptatibus, eaque!</td>
                    <td>Molestiae, cupiditate!</td>
                    <td>Vel, odio.</td>
                    <td>Maxime, dicta.</td>
                    <td>Modi, laboriosam.</td>
                    <td>Pariatur, non.</td>
                     <td>Inventore, at.</td>
                    <td>Facilis, voluptatum.</td>
                    <td>Laboriosam, voluptatibus.</td>
                    <td>Voluptatibus, eaque!</td>
                    <td>Molestiae, cupiditate!</td>
                    <td>Vel, odio.</td>
                    <td>Maxime, dicta.</td>
                    <td>Modi, laboriosam.</td>
                    <td>Pariatur, non.</td> <td>Inventore, at.</td>
                    <td>Facilis, voluptatum.</td>
                    <td>Laboriosam, voluptatibus.</td>
                    <td>Voluptatibus, eaque!</td>
                    <td>Molestiae, cupiditate!</td>
                    <td>Vel, odio.</td>
                    <td>Maxime, dicta.</td>
                    <td>Modi, laboriosam.</td>
                    <td>Pariatur, non.</td> <td>Inventore, at.</td>
                    <td>Facilis, voluptatum.</td>
                    <td>Laboriosam, voluptatibus.</td>
                    <td>Voluptatibus, eaque!</td>
                    <td>Molestiae, cupiditate!</td>
                    <td>Vel, odio.</td>
                    <td>Maxime, dicta.</td>
                    <td>Modi, laboriosam.</td>
                    <td>Pariatur, non.</td>
                </tr>
                <tr>
                    <th>Lorem ipsum.</th>
                    <td>Animi, quisquam!</td>
                    <td>Dicta, aliquam.</td>
                    <td>Ea, nisi.</td>
                    <td>Rem, labore.</td>
                    <td>Eos, eveniet.</td>
                    <td>Velit, eligendi.</td>
                    <td>Esse, incidunt.</td>
                    <td>Provident, accusantium?</td>
                    <td>Commodi, fugiat!</td>
                     <td>Inventore, at.</td>
                    <td>Facilis, voluptatum.</td>
                    <td>Laboriosam, voluptatibus.</td>
                    <td>Voluptatibus, eaque!</td>
                    <td>Molestiae, cupiditate!</td>
                    <td>Vel, odio.</td>
                    <td>Maxime, dicta.</td>
                    <td>Modi, laboriosam.</td>
                    <td>Pariatur, non.</td> <td>Inventore, at.</td>
                    <td>Facilis, voluptatum.</td>
                    <td>Laboriosam, voluptatibus.</td>
                    <td>Voluptatibus, eaque!</td>
                    <td>Molestiae, cupiditate!</td>
                    <td>Vel, odio.</td>
                    <td>Maxime, dicta.</td>
                    <td>Modi, laboriosam.</td>
                    <td>Pariatur, non.</td> <td>Inventore, at.</td>
                    <td>Facilis, voluptatum.</td>
                    <td>Laboriosam, voluptatibus.</td>
                    <td>Voluptatibus, eaque!</td>
                    <td>Molestiae, cupiditate!</td>
                    <td>Vel, odio.</td>
                    <td>Maxime, dicta.</td>
                    <td>Modi, laboriosam.</td>
                    <td>Pariatur, non.</td>
                </tr>
                <tr>
                    <th>Lorem ipsum.</th>
                    <td>Odit, dolore.</td>
                    <td>Ab, harum?</td>
                    <td>Delectus, consequuntur?</td>
                    <td>Labore, iusto!</td>
                    <td>Aperiam, temporibus.</td>
                    <td>Odit, iusto!</td>
                    <td>Repellendus, placeat.</td>
                    <td>Provident, odit!</td>
                    <td>Temporibus, laudantium.</td>
                     <td>Inventore, at.</td>
                    <td>Facilis, voluptatum.</td>
                    <td>Laboriosam, voluptatibus.</td>
                    <td>Voluptatibus, eaque!</td>
                    <td>Molestiae, cupiditate!</td>
                    <td>Vel, odio.</td>
                    <td>Maxime, dicta.</td>
                    <td>Modi, laboriosam.</td>
                    <td>Pariatur, non.</td> <td>Inventore, at.</td>
                    <td>Facilis, voluptatum.</td>
                    <td>Laboriosam, voluptatibus.</td>
                    <td>Voluptatibus, eaque!</td>
                    <td>Molestiae, cupiditate!</td>
                    <td>Vel, odio.</td>
                    <td>Maxime, dicta.</td>
                    <td>Modi, laboriosam.</td>
                    <td>Pariatur, non.</td> <td>Inventore, at.</td>
                    <td>Facilis, voluptatum.</td>
                    <td>Laboriosam, voluptatibus.</td>
                    <td>Voluptatibus, eaque!</td>
                    <td>Molestiae, cupiditate!</td>
                    <td>Vel, odio.</td>
                    <td>Maxime, dicta.</td>
                    <td>Modi, laboriosam.</td>
                    <td>Pariatur, non.</td>
                </tr>
                <tr></tr>
            </tbody>
        </table>-->

    </div>
</div>




            <div class="box-body table-responsive no-padding">
              <?//=TablesWidget::widget()?>
            </div>
            <!-- /.box-body -->
          </div>
          

            <!-- THE CALENDAR -->
            <?
/*
            $JSEventClick =<<<EOF
function(calEvent, jsEvent, view) {
 
   $.get('/eventsGroupVisits/default/update',{'id':calEvent.id},function (data) {
        $('#myModal').modal('show')
            .find('#modalContent')
            .html(data);
    });
    
     
}
EOF;
            $JSDayClick=<<<EOF
function(calEvent, jsEvent, view) {

    $.get('/eventsGroupVisits/default/create',{'date':calEvent.format()},function (data) {
        $('#myModal').modal('show')
            .find('#modalContent')
            .html(data);
    });
}
EOF;


            echo  yii2fullcalendar\yii2fullcalendar::widget([
                'options' => [
                    'lang' => 'ru',

                    //... more options to be defined here!
                ],
                'clientOptions' => [
                    'id' => 'calendar',
                    // 'allDaySlot' => false,
                    //    'selectHelper' => true,
                     'eventClick' => new JsExpression($JSEventClick),
                    'dayClick' => new JsExpression($JSDayClick),
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

            ]);*/
            ?>

        <!-- /.card-body -->
    </div>
    <!-- /. box -->
</div>






<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

            </div>
            <div class="modal-body" >
                <div id="modalContent"> </div>
            </div>

        </div>
    </div>
</div>
