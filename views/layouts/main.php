<?php
/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <!--
       This is a starter template page. Use this page to start your new project from
       scratch. This page gets rid of all links and provides the needed markup only.
       -->
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>
    <body class="hold-transition sidebar-mini">
    <?php $this->beginBody() ?>
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <?= Html::a('Главная', ['/admin/index'], ['class' => 'nav-link']) ?>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <?= Html::a(Html::button('ВЫХОД', ['class' => 'btn btn-block btn-primary btn-flat']), ['/admin/logout'], ['class' => 'nav-link']) ?>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="/web/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                     style="opacity: .8">
                <span class="brand-text font-weight-light">Роботрек</span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                   <!--     <img src="/web//img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?=Yii::$app->user->identity->last_name.' '.Yii::$app->user->identity->first_name?></a>
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                           with font-awesome or any other icon font library -->
                        <li class="nav-item has-treeview menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fa fa-list"></i>
                                <p>
                                    ОБЪЕКТЫ
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/courses" class="nav-link">
                                        <i class="nav-icon fa fa-th"></i>
                                        <p>
                                            КУРСЫ
                                            <span class="right badge badge-primary" style="margin-right: 25px;">
                                                <?=\app\models\Courses::find()->where(['active'=>1])->count()?></span>
                                            <span class="right badge badge-danger"> <?=\app\models\Courses::find()->where(['active'=>0])->count()?></span>
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="/groups" class="nav-link">
                                        <i class="nav-icon fa fa-th"></i>
                                        <p>
                                            ГРУППЫ
                                            <span class="right badge badge-primary" style="margin-right: 25px;"><?=\app\models\Groups::find()->where(['active'=>true])->count()?></span>
                                            <span class="right badge badge-danger"><?=\app\models\Groups::find()->where(['active'=>false])->count()?></span>
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/students" class="nav-link">
                                        <i class="nav-icon fa fa-th"></i>
                                        <p>
                                            СТУДЕНТЫ
                                            <span class="right badge badge-primary" style="margin-right: 25px;"><?=\app\models\Students::find()->where(['active'=>true])->count()?></span>
                                            <span class="right badge badge-danger"><?=\app\models\Students::find()->where(['active'=>false])->count()?></span>
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/teachers" class="nav-link">
                                        <i class="nav-icon fa fa-th"></i>
                                        <p>
                                            ПРЕПОДАВАТЕЛИ
                                            <span class="right badge badge-primary" style="margin-right: 25px;"><?=\app\models\Teachers::find()->where(['active'=>true])->count()?></span>
                                            <span class="right badge badge-danger"><?=\app\models\Teachers::find()->where(['active'=>false])->count()?></span>
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fa fa-inbox"></i>
                                <p>
                                    УПРАВЛЕНИЕ
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/teachersCourses" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>Кураторы курсов</p>
                                        <span class="right badge badge-primary" ><?=\app\models\TeachersCourses::find()->where(['active'=>true])->count()?></span>
                                        <span class="right badge badge-danger"><?=\app\models\TeachersCourses::find()->where(['active'=>false])->count()?></span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/eventsGroupVisits" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>Посещаемость</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/studentspayment" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>Счета-студенты</p>
                                        <span class="right badge badge-primary" style="/*margin-right: 25px;*/"><?=\app\models\StudentsPayment::find()->where(['active'=>true])->count()?></span>
                                        <span class="right badge badge-danger"><?=\app\models\StudentsPayment::find()->where(['active'=>false])->count()?></span>

                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <?= $content ?>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->
        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
            </div>
            <!-- Default to the left -->
        </footer>
    </div>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>