<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EventsGroupVisits */

$this->title = 'Обновить событие ';
$this->params['breadcrumbs'][] = ['label' => 'Events Group Visits', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновление';
?>
<h2><?= Html::encode($this->title) ?></h2>

<?= $this->render('_form', [
    'model' => $model,
    'student_group' => $student_group,

]) ?>
<?

$script = <<< JS
  
   $.post( "/eventsGroupVisits/default/listsup?id="+$('#id_group option:selected').val()+"&event={$model->id}", function( data ) {

                $("#eventsgroupvisits-student_list").html( data );

            });
  
JS;

$this->registerJs($script, yii\web\View::POS_READY);


?>
</div>


<script>
  /*  $(document).ready(function () {

        $('#id_group').ready(function () {
            alert($('#id_group option:selected').val());


            $.post( "/eventsGroupVisits/default/listsup?id="+$('#id_group option:selected').val(), function( data ) {

                $("#eventsgroupvisits-student_list").html( data );

            });
        })

    });
*/

</script>
