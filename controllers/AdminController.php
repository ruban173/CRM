<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;

class AdminController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'access' => [
               'class' => AccessControl::className(),
               'only' => [ 'logout'],
                'rules' => [
                  /*  [
                         'allow' => true,
                         'actions' => ['index','login'],
                         'roles' => ['?'],
                     ],*/
                    [
                        'allow' => true,
                        'actions' => ['index','logout'],
                        'roles' => ['@'],
                    ],

                ],

            ],


        ];
    }
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',

            ],
        ];
    }
    public function beforeAction($action)
    {
        if ($action->id == 'error') {
            $this->layout = 'autorization';
        }

        return parent::beforeAction($action);
    }
    public function actionIndex()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->render('index');
        }
        return $this->redirect('/admin/login');
    }

	 public function actionLogin()
    {
        $this->layout='autorization';
        if (!Yii::$app->user->isGuest) {
            return $this->redirect('/eventsGroupVisits');
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
  /*  public function actionError()
    {
        $this->layout='autorization';
        return $this->render('error');
    }*/
  /*  public function actionError()
{

    $exception = Yii::$app->errorHandler->exception;
    if ($exception !== null) {
        return $this->render('error', ['exception' => $exception]);
    }
}*/
}
