<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'language' => 'ru-RU',
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
	/*'baseUrl'=> '', */
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'defaultRoute' => 'admin',
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'BVRbwURLvrE6kcIKnMNhWj8CBMr364WE',

            'baseUrl' => '',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => ['admin/login'],

        ],
        'errorHandler' => [
            'errorAction' => 'admin/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
           /* 'enableStrictParsing' => true,*/
            'rules' => [
                '/' => 'admin/login',
                '<controller>/<action>' => '<controller>/<action>',
            ],
        ],
    ],
    'modules' => [
        'courses' => [
            'class' => 'app\modules\courses\courses',
        ],
        'students' => [
            'class' => 'app\modules\students\students',
        ],
        'groups' => [
            'class' => 'app\modules\groups\groups',
        ],
        'teachers' => [
            'class' => 'app\modules\teachers\teachers',
        ],
        'teachersCourses' => [
            'class' => 'app\modules\teachersCourses\teachersCourses',
        ],
        'eventsGroupVisits' => [
            'class' => 'app\modules\eventsGroupVisits\eventsGroupVisits',
        ],
        'studentspayment' => [
            'class' => 'app\modules\studentspayment\studentspayment',
        ],
    ],
    'params' => $params,

];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
