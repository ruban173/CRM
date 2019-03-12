<?php

namespace app\modules\teachersCourses\controllers;

use Yii;
use app\models\TeachersCourses;
use app\models\TeachersCoursesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Groups;
use yii\helpers\ArrayHelper ;

/**
 * DefaultController implements the CRUD actions for TeachersCourses model.
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
     * Lists all TeachersCourses models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TeachersCoursesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,

        ]);
    }

    /**
     * Displays a single TeachersCourses model.
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
     * Creates a new TeachersCourses model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TeachersCourses();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }
        $group= [];
        return $this->render('create', [
            'model' => $model,
            'group' => $group,

        ]);
    }

    /**
     * Updates an existing TeachersCourses model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        $model->group_param= ArrayHelper::map(
            Groups::find()->where(['id_courses'=>$model->id_courses])->All()
            ,'id','title');
        return $this->render('update', [
            'model' => $model,
            'group' => $model->group_param,

        ]);
    }

    /**
     * Deletes an existing TeachersCourses model.
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
    public function actionLists($id){
        $rows = \app\models\Groups::find()->where(['id_courses' => $id])->all();
        $opt='';
        if(count($rows)>0){
            foreach($rows as $row){
               $opt.= "<option value='$row->id'>$row->title</option>";
            }
            echo $opt;
        }
        else{
            echo "<option>Нет групп</option>";
        }

    }

    /**
     * Finds the TeachersCourses model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TeachersCourses the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TeachersCourses::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
