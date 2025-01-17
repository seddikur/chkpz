<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'name' => 'Test',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'ru',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '9fUQYl_w6WJDakt4TPSzp183IlG2Ezl5',
            'baseUrl' => ''
        ],
        'authManager' => [
            'class' => 'yii\rbac\PhpManager',
            //зададим куда будут сохраняться наши файлы конфигураций RBAC/ это и по умолчанию
            'itemFile' => '@app/rbac/items.php',
            'assignmentFile' => '@app/rbac/assignments.php',
            'ruleFile' => '@app/rbac/rules.php',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => \yii\symfonymailer\Mailer::class,
            'viewPath' => '@app/mail',
            // send all mails to a file by default.
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
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
//                '/' => 'home/index',
//                'gallery' => 'site/gallery',
//                'sitemap.xml' => 'sitemap/index',
//                'search.html' => 'site/search',
//                '<cat:[-\w]+>/<id:[\d]+>-<alias:[-\w]+>' => 'content/index',
//                '<cat:[-\w]+>/<id:[\d]+>' => 'content/index',
//                '<id:[-\w]+>' => 'content/index',
            ],
        ],


//        'assetManager' => [
//            'bundles' => [
//                'yii\web\JqueryAsset' => [
//                    'js' => ['jquery.min.js'],
//                ],
//                'yii\bootstrap\BootstrapPluginAsset' => [
//                    'sourcePath' => null, 'js' => [],
//                ],
//                'yii\bootstrap\BootstrapAsset' => [
//                    'js' => ['js/bootstrap.js'],
//                ],
//            ],
//        ],

    ],

    'modules' => [
        'crm' => ['class' => \app\modules\crm\CrmModule::class],
        'users' => ['class' => \app\modules\users\UsersModule::class],
        'content' => ['class' => \app\modules\content\ContentModule::class],
        'menu' => ['class' => \app\modules\menu\MenuModule::class],
        'gridview' => ['class' => 'kartik\grid\Module'],
        'editablecolumn' => [
            'class' => \vsk\editableColumn\module\EditableColumnModule::class,
        ]
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        'allowedIPs' => ['*'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['*'],
    ];
}

return $config;
