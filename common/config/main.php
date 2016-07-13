<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
	'language' => 'zh-CN', /*'en',*/
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
		'authManager' => [
            'class' => 'yii\rbac\DbManager'
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.163.com',
                'username' => 'zyf880916@163.com',
                'password' => 'ZyFLv23@&55Icw',
                'port' => '25',
            ],
        ],
    ],
	'modules' => [
		'user' => [
			'class' => 'dektrium\user\Module',
			// you will configure your module inside this file
			// or if need different configuration for frontend and backend you may
			// configure in needed configs
			'mailer' => [
                'sender'                => 'zyf880916@163.com', // or ['no-reply@myhost.com' => 'Sender name']
                'welcomeSubject'        => 'Welcome subject',
                'confirmationSubject'   => 'Confirmation subject',
                'reconfirmationSubject' => 'Email change subject',
                'recoverySubject'       => 'Recovery subject',
            ],
            'enableUnconfirmedLogin' => true,
            'confirmWithin' => 21600,
            'cost' => 12,
            'admins' => ['admin']			
		],
	],
];
