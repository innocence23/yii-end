<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
	'modules' => [
		'user' => [
			// following line will restrict access to admin controller from frontend application
			//'as frontend' => 'dektrium\user\filters\FrontendFilter',
		],
	],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
		//yii2user
		'user' => [
			'identityCookie' => [
				'name'     => '_frontendIdentity',
				'path'     => '/',
				'httpOnly' => true,
			],
		],
		'session' => [
			'name' => 'FRONTENDSESSID',
			'cookieParams' => [
				'httpOnly' => true,
				'path'     => '/',
			],
		],  
        /*'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],*/	
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
    ],
    'params' => $params,
];
