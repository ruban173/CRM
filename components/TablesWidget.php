<?php
// подключаем пространство имен
namespace app\components;
// импортируем класс Windget и Html хелпер
use Yii;
use yii\base\Widget;
use yii\helpers\Html;
// расширяем класс Widget
class TablesWidget extends Widget
{
    public $model;

    public $classTable=['table', 'table-bordered', 'table-striped', 'dataTable'];

	public $classHead='';
	public $classHeadTh='sorting';
	public $classHeadTr='';

    public function init(){
        parent::init();
    }

    public function run(){




$tableBody='<thead>
                <tr role="row">
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending"  >Rendering engine
                </th>
              </tr>
                </thead>';
$th=Html::tag('td', '', ['class' => $this->classHeadTh]);
for($i=0;$i<8;$i++){
 //$th.=Html::tag('th', 'Hello!!!!!', ['class' => $this->classHeadTh]);
}

  
  
$begin = new \DateTime( '2019-01-01');
$end = new \DateTime();
$end = $end->modify( '+1 day' ); 
 
$interval = new \DateInterval('P1D');
$daterange = new \DatePeriod($begin, $interval ,$end);
Yii::$app->formatter->locale = 'ru-RU';
 
foreach($daterange as $date){
	 $th.=Html::tag('th',  Yii::$app->formatter->asDate($date,"M d"), ['class' => $this->classHeadTh]);
   // echo $date->format("Y-m-d") . "<br>";
}

$tr=Html::tag('tr', $th, ['class' => $this->classHeadTr]);

  $tableHead=Html::tag('thead', $tr, ['class' => $this->classHead]);
 

  foreach (\app\models\Students::find()->each() as $student) {
  	 $th=Html::tag('th', $student->first_name .' ' .$student->last_name , ['class' => '']);
  	foreach($daterange as $date){
	 $th.=Html::tag('td',  '', ['class' => '']);
   
}
   $tableHead.=Html::tag('tr',$th , ['class' => '']);
   
}
	 
  $table=Html::tag('table', $tableHead, ['class' => $this->classTable]);
 // $table=Html::tag('table', $tableBody, ['class' => $this->classTable]);

        return $table;
    }
}
?>