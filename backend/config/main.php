<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
	'modules' => [
		'user' => [
			// following line will restrict access to profile, recovery, registration and settings controllers from backend
			'as backend' => 'dektrium\user\filters\BackendFilter',
		],
		'admin' => [
			'class' => 'mdm\admin\Module',
			'layout' => 'left-menu', // it can be '@path/to/your/layout'.
			
			'controllerMap' => [
				/*'assignment' => [
					'class' => 'mdm\admin\controllers\AssignmentController',
					'userClassName' => 'app\models\User',
					'idField' => 'user_id'
				],
				'other' => [
					'class' => 'path\to\OtherController', // add another controller
				],*/				
			],
			'menus' => [
				'assignment' => [
					'label' => 'Grand Access' // change label
				],
				//'route' => null, // disable menu route 
				'user' => null, // disable user route 
			]
		],
	],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
		//yii2user
		'user' => [
			'identityCookie' => [
				'name'     => '_backendIdentity',
				'path'     => '/admin',
				'httpOnly' => true,
			],
		],
		'session' => [
			'name' => 'BACKENDSESSID',
			'cookieParams' => [
				'httpOnly' => true,
				'path'     => '/admin',
			],
		], 		
		/*
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],*/	
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],		
		'view' => [
			 'theme' => [
				 'pathMap' => [
					//'@app/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app'
					'@app/views' => '@muban/dmstr-yii2-adminlte-asset'
				 ],
			 ],
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
		'authManager' => [
            //'class' => 'yii\rbac\PhpManager', // or use 'yii\rbac\DbManager'
            'class' => 'yii\rbac\DbManager'
        ]
    ],
	'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'site/*',
            'admin/*',
            'some-controller/some-action',
            // The actions listed here will be allowed to everyone including guests.
            // So, 'admin/*' should not appear here in the production, of course.
            // But in the earlier stages of your development, you may probably want to
            // add a lot of actions here until you finally completed setting up rbac,
            // otherwise you may not even take a first step.
        ]
    ],
    'params' => $params,
];
