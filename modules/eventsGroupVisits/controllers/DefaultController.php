<?php

namespace app\modules\eventsGroupVisits\controllers;

use app\models\Students;
use app\models\StudentsVisits;
use Yii;
use app\models\EventsGroupVisits;
use app\models\TeachersCourses;
use app\models\EventsGroupVisitsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\bootstrap;
use yii\helpers\ArrayHelper;

/**
 * DefaultController implements the CRUD actions for EventsGroupVisits model.
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
     * Lists all EventsGroupVisits models.
     * @return mixed
     */
    public function actionIndex()
    {

        $events = EventsGroupVisits::find()->all();
        $tasks = [];
        foreach ($events as $event_obj) {

            $event = new \yii2fullcalendar\models\Event();
            $event->id = $event_obj->id;
            $event->resourceId = $event_obj->id;
            $event->color = $event_obj->color;
            $event->textColor = 'white';

           // print_r($event_obj); exit;
            $event->title = $event_obj->group->title;
            $event->start = date('Y-m-d\TH:i:s\Z', strtotime($event_obj->date . ' ' . $event_obj->time));
            //  $event->end = date('Y-m-d\TH:i:s\Z',strtotime($time->date_end.' '.$time->time_end));
            $tasks[] = $event;
        }

        return $this->render('index', [
            'events' => $tasks,

        ]);
    }

    /**
     * Displays a single EventsGroupVisits model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new EventsGroupVisits model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($date)
    {
        $model = new EventsGroupVisits();
        $model->date = $date;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
                  return $this->redirect(['index']);
        }

        return $this->renderAjax('create', [
            'model' => $model,
            'student_group' => [],
        ]);
    }

    /**
     * Updates an existing EventsGroupVisits model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $model->student_list = [];

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['index']);
        };

        return $this->renderAjax('update', [
            'model' => $model,
            'student_group' => [],

        ]);
    }

    /**
     * Deletes an existing EventsGroupVisits model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
       $this->findModel($id)->delete();
       StudentsVisits::deleteAll(['events_id' => $id]);



        return $this->redirect(['index']);
    }

    public function actionLists($id)
    {
        ob_start();
        $sql='SELECT * FROM `students` WHERE `active`=TRUE AND id IN ( SELECT id_student from groups_select WHERE id_group=:id_group)';
        $rows =\app\models\Students::findBySql($sql, [
            ':id_group' => $id
        ])->all();

       // $rows = \app\models\Students::find()->where(['group_id' => $id])->all();
        $opt = '';
        if (count($rows) > 0) {
            foreach ($rows as $row) {
                $opt .= '<label><input type="checkbox" name="EventsGroupVisits[student_list][]" value="' . $row->id . '"> ' . $row->first_name . ' ' . $row->middle_name . ' ' . $row->last_name . '</label>';
                $opt .= '<input style="margin-left:10px" type="checkbox" name="EventsGroupVisits[absence][]" value="'.$row->id.'"> <span style="color:red;">неуваж   </span><br>';

            };
            echo $opt;
        } else {
            echo "<label>Нет студентов</label>";
        }
        return ob_get_clean();
    }
    public function actionListsup($id,$event)
    {
        ob_start();

        $sql='SELECT * FROM `students` WHERE `active`=TRUE AND id IN ( SELECT id_student from groups_select WHERE id_group=:id_group)';
        $rows =\app\models\Students::findBySql($sql, [
            ':id_group' => $id
        ])->all();

        $events=\app\models\StudentsVisits::findAll(['events_id'=>$event]);

        $opt = '';
        $absence=null;
        if (count($rows) > 0) {
            foreach ($rows as $row) {
                foreach ($events as $event)
                    if ($event->student_id==$row->id) {$absence=$event; break;}

                $checked=($absence->absence=='неуваж')?'checked':null;

                $checkedStud=($absence->status==1)?'checked':null;

                $opt .= '<label><input type="checkbox" name="EventsGroupVisits[student_list][]" '.$checkedStud.'   value="' . $row->id . '"> ' . $row->first_name . ' ' . $row->middle_name . ' ' . $row->last_name . '</label>';
                $opt .= '<input style="margin-left:10px" type="checkbox" name="EventsGroupVisits[absence][]" '.$checked.' value="'.$row->id.'"> <span style="color:red;">неуваж   </span><br>';

            };
            echo $opt;
        } else {
            echo "<label>Нет студентов</label>";
        }
        return ob_get_clean();
    }
    /**
     * Finds the EventsGroupVisits model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return EventsGroupVisits the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EventsGroupVisits::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
