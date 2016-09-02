<?php
$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'modules' => [
        'v4t3t4' => [
            'class'   =>'app\modules\v4t3t4\v4t3t4',
        ],
        'v4t3t5' => [
            'class'   =>'app\modules\v4t3t5\v4t3t5',
        ],
        '5' => [
            'class'   =>'app\modules\v4t3t5\v4t3t5',
        ],
    ],
    'controllerMap' => [
        'userLogin'=>'app\modules\v4t3t4\controllers\Users\UserLogin',
    ],

    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'd472241f86daf6ecc9bede4a26dfe3b3',
        ],
        'response' => [
            'class' => 'app\components\error\Response',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\VerificationModel',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
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
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
];

//$config['yimai_version']=require(__DIR__."/version_number.php");

$db= require(__DIR__ . '/db.php');
$config['components']=$config['components']+$db;

$redis= require(__DIR__ . '/redis.php');
$config['components']=$config['components']+$redis;

$urlManager= require(__DIR__ . '/urlManager.php');
$config['components']['urlManager']=$urlManager;


if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
