<?php

namespace app\modules\students\controllers;


use app\models\Groups;
use app\models\StudentsPayment;
use Codeception\Platform\Group;
use Yii;
use app\models\Students;
use app\models\EventsGroupVisits;
use app\models\StudentsVisits;
use app\models\StudentsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use app\models\GroupsSelect;
/**
 * DefaultController implements the CRUD actions for Students model.
 */
class DefaultController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Students models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StudentsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Students model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {

        $events = Yii::$app->db->createCommand('SELECT eventsGroupVisits.id, color,title,eventsGroupVisits.date,eventsGroupVisits.time,students_visits.status,students_visits.absence FROM `students_visits` INNER JOIN eventsGroupVisits 
                                        ON students_visits.events_id=eventsGroupVisits.id INNER JOIN groups 
                                        ON eventsGroupVisits.group_id=groups.id 
                                        WHERE students_visits.student_id='.$id.' 
                                       ')
        ->queryAll();
     $tasks = [];
        for ($i=0;$i<count($events);$i++){
            $event = new \yii2fullcalendar\models\Event();
            $event->id = $events[$i]['id'];
            $event->resourceId =$events[$i]['id'];
            if( $events[$i]['status']==1){

                $color=$events[$i]['color'];
                $title=$events[$i]['title'];
            }
            else{
                $absence_status=($events[$i]['absence']=='уваж' || $events[$i]['absence']==null)?'У':'Н';
                $color='red';
                $title=$events[$i]['title'].' (Отсут. '.$absence_status.')';
            }
            $event->color = $color;
            $event->textColor = 'white';
            $event->title =  $title;
            $event->start = date('Y-m-d\TH:i:s\Z', strtotime($events[$i]['date'] . ' ' . $events[$i]['time']));
            //  $event->end = date('Y-m-d\TH:i:s\'',strtotime($time->date_end.' '.$time->time_end));
            $tasks[] = $event;

        };
       $count=StudentsVisits::find()
            ->where(['student_id' => $id])
            ->count();
   $visit= StudentsVisits::find()
        ->where(['student_id' => $id,'students_visits.status'=>1])
        ->count();
  $absence_all=StudentsVisits::find()
       ->where(['student_id' => $id,'students_visits.status'=>0])
       ->count();
  $absence_false=StudentsVisits::find()
      ->where(['student_id' => $id,'students_visits.status'=>0,'absence'=>'неуваж'])
      ->count();

        $balans= Yii::$app->db->createCommand('SELECT IFNULL(SUM(price),0)   as price ,
                  IFNULL(SUM(count),0)  as count FROM   students_payment  WHERE  status=1 AND id_student='.$id.' ;
                                       ')
            ->queryOne();
        $balans_buff= Yii::$app->db->createCommand('SELECT IFNULL(SUM(price),0)   as price ,
                  IFNULL(SUM(count),0)  as count FROM   students_payment  WHERE  status=0 AND id_student='.$id.' ;
                                       ')
            ->queryOne();

      //  print_r( $balans);exit();
        $lesson=[
            'count'=> $count,
            'visit'=>$visit,
            'absence_all'=>$absence_all,
            'absence_false'=>$absence_false,
            'balans'=> $balans,
            'balans_buff'=> $balans_buff,

        ];




         return $this->render('view', [
            'events' => $tasks,
            'lesson'=>$lesson


        ]);
    }

    /**
     * Creates a new Students model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Students();

        if ($model->load(Yii::$app->request->post()) && $model->save() ) {

            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,

        ]);
    }

    /**
     * Updates an existing Students model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $group_id=GroupsSelect::findAll(['id_student'=>$id]);
        $res=[];
        foreach ($group_id as $val) $res[]=$val->id_group;

        $model->group_id=$res;

        if ($model->load(Yii::$app->request->post())&& $model->save() ) {

            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,

        ]);
    }

    /**
     * Deletes an existing Students model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        //$this->findModel($id)->delete();
        $obj=$this->findModel($id);
        $obj->active=false;
        $obj->save();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Students model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Students the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Students::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function actionPayment($id)
    {
        //$this->findModel($id)->delete();
        $stud=$this->findModel($id);
        $group_id=GroupsSelect::findAll(['id_student'=>$id]);
        $res=[];
        foreach ($group_id as $val) $res[]=$val->id_group;
        $model=new StudentsPayment();
        $groups=Groups::findAll($res);;

        if ($model->load(Yii::$app->request->post() ) ) {

            $model->id_course=Groups::findOne($model->id_group)->id_courses;
            $model->id_student=$id;
          //  print_r($model);exit;
            $model->save();
            return $this->redirect(['index']);
        }


        return $this->render('payment', [
            'model' => $model,
            'groups'=> $groups,



        ]);
    }
}
