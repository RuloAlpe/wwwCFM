<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
		
	'modules' => [
			'modUsuarios' => [
					'class' => 'app\modules\ModUsuarios\ModUsuarios'
			]
	],
		
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '1',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [ 
			'identityClass' => 'app\modules\ModUsuarios\models\EntUsuarios',
			'enableAutoLogin' => false,
			'authTimeout' => 3600 // Segundos que durara la sesion 
		],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [ 
			'class' => 'yii\swiftmailer\Mailer',
			'transport' => [ 
				'class' => 'Swift_SmtpTransport',
				'host' => 'smtp.gmail.com', // e.g. smtp.mandrillapp.com or smtp.gmail.com
				'username' => 'humberto2geekonemonkey@gmail.com',
				'password' => '9&s3Z2L24e9^3GfXt',
				'port' => '587', // Port 25 is a very common port too
				'encryption' => 'tls' 
			] 
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
        'db' => require(__DIR__ . '/db.php'),
    		
    	'session' => [
    			'timeout'=>3600 // Segundos que durara la sesion
    	],
        'urlManager' => [ 
			'class' => 'yii\web\UrlManager',
			// Disable index.php
			'showScriptName' => false,
			// Disable r= routes
			'enablePrettyUrl' => true,
			'enableStrictParsing' => true,
			'rules' => [
				'<controller:\w+>/<id:\d+>' => '<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
				'<controller:\w+>/<action:\w+>' => '<controller>/<action>',
				
				// Estas direcciones son necesarias para el modulo			
				'cambiar-pass/<t:\w+>' => 'modUsuarios/manager/cambiar-pass',
				'peticion-pass' => 'modUsuarios/manager/peticion-pass',
				'test' => 'modUsuarios/manager/test',
				'activar-cuenta/<t:\w+>' => 'modUsuarios/manager/activar-cuenta',
				'sign-up' => 'modUsuarios/manager/sign-up',
				'login' => 'modUsuarios/manager/login',
				'callback-facebook' => 'modUsuarios/manager/callback-facebook',
				'/' => 'site/index' 
			]
		]
    ],
    'params' => $params,
		'modUsuarios' => [
				'facebook'=>[
						'usarLoginFacebook'=>true,
						'APP_ID'=>'1754524001428992', // Identificador de la aplicación
						'APP_SECRET'=>'739c88b9290adb41a040bde473c1d54d', // Clave secreta de la aplicación
						'CALLBACK_URL'=>'http://notei.com.mx/test/wwwLogin/web/callback-facebook',
						'dataBasic'=>true, // Obtiene datos basicos del usuario como nombre, imagen, apellido, email
						'friends'=>true, // Visualiza a los amigos que esten usuando la aplicacion
						'permisosForzosos'=>'email, user_friends',
						'permisos'=>'public_profile, email, user_friends',
				],
				'sesiones' => [
						'guardarSesion' => true, // Guardara el registro de sesiones del usuario
						'sesionUnicaPorUsuario' => true, // Solamente habra una sesión por usuario
						'cerrarPrimeraSesion' => true // Cierra la primera sesion abierta para una nueva sesion
				],
				'mandarCorreoActivacion' => true, // Envia correo electronico para activar la cuenta del usuario
				'email' => [
						'emailActivacion' => 'welcome@2gom.com.mx',
						'subjectActivacion' => 'Activar cuenta',
						'emailRecuperarPass' => 'support@2gom.com.mx',
						'subjectRecuperarPass' => 'Recuperar contraseña'
				],
				'recueperarPass' => [
						'diasValidos' => 2, // Numero de dias que durara la recuperación de la contraseña
						'validarFechaFinalizacion' => true
				] // validar si la recuperación de contraseña validara la fecha de expiracion
		
		]
];

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
