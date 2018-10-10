<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
	'name' => 'E-Billing PPS-NZJ',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [
            'sliderrevolution' => [
                'class' => 'wadeshuler\sliderrevolution\SliderModule',
                'pluginLocation' => '@frontend/views/private/rs-plugin',    // <-- path to your rs-plugin directory
            ],
            'gridview' =>  [
                'class' => '\kartik\grid\Module'
            ],
        ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
			//'baseUrl' => '\nzj\frontend\web',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
        'urlManager' => [
			//'baseUrl' => 'http://tkpu.localhost',
            'class' => 'yii\web\UrlManager',
			'enablePrettyUrl' => true,
			'showScriptName' => true,
			'enableStrictParsing' => false,
			'rules' => array(
                    'transaction/getrequestdetail/<id>' => 'transaction/getrequestdetail',
					),
		],
        'formatter' => [
            'dateFormat' => 'dd.MM.yyyy',
            'decimalSeparator' => ',',
            'thousandSeparator' => '.',
            'currencyCode' => 'Rp',
       ],
    ],
    'params' => $params,
];
