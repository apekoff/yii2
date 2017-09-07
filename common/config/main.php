<?php

use yii\filters\AccessControl;

return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
    'modules' => [
        'pages' => [
            'class' => 'bupy7\pages\Module',
            'controllerMap' => [
                'manager' => [
                    'class' => 'bupy7\pages\controllers\ManagerController',
                    'as access' => [
                        'class' => AccessControl::className(),
                        'rules' => [
                            [
                                'allow' => true,
                                //'roles' => ['admin'],
                                'roles' => ['@'],
                            ],
                        ],
                    ],
                ],
            ],
            'pathToImages' => '@webroot/images',
            'urlToImages' => '@web/images',
            'pathToFiles' => '@webroot/files',
            'urlToFiles' => '@web/files',
            'uploadImage' => true,
            'uploadFile' => true,
            'addImage' => true,
            'addFile' => true,
        ],
    ],
    'language' => 'ru-RU',
    'sourceLanguage' => 'ru-RU',
    //'sourceLanguage' => 'en-US',

];
