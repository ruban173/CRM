<?php

namespace app\modules\studentspayment\controllers;

use Yii;
use app\models\StudentsPayment;
use app\models\Courses;
use app\models\Groups;
use app\models\Students;

use app\models\StudentsPaymentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DefaultController implements the CRUD actions for StudentsPayment model.
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
     * Lists all StudentsPayment models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StudentsPaymentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single StudentsPayment model.
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
     * Creates a new StudentsPayment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new StudentsPayment();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing StudentsPayment model.
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

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing StudentsPayment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $obj=$this->findModel($id);
        $obj->active=false;
        $obj->save();

        return $this->redirect(['index']);
    }

    /**
     * Finds the StudentsPayment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return StudentsPayment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = StudentsPayment::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function actionListsgroup($id)
    {
        ob_start();

        $rows =Groups::findAll(['id_courses'=>$id]);

        $opt = '<option value="">-----------</option>';
        if (count($rows) > 0) {
            foreach ($rows as $row) {

                $opt .='<option value="' . $row->id . '">' . $row->title . '</option>';
            };
            echo $opt;
        } else {
            echo "<label>Нет групп</label>";
        }
        return ob_get_clean();
    }
    public function actionListstudent($id)
    {
        ob_start();
        $sql='SELECT * FROM `students` WHERE `active`=TRUE AND id IN ( SELECT id_student from groups_select WHERE id_group=:id_group)';
        $rows =\app\models\Students::findBySql($sql, [
            ':id_group' => $id
        ])->all();

        $opt = '';
        if (count($rows) > 0) {
            foreach ($rows as $row) {

                $opt .='<option value="' . $row->id . '">' . $row->first_name . ' ' . $row->middle_name . ' ' . $row->last_name . '</option>';

            };
            echo $opt;
        } else {
            echo "<label>Нет студентов</label>";
        }
        return ob_get_clean();
    }
}
