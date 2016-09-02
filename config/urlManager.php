<?php
/**
 * Created by PhpStorm.
 * User: xywy
 * Date: 2016/6/16
 * Time: 17:31
 */
return [
    'enablePrettyUrl' => true,
    'enableStrictParsing' => false,
    'showScriptName' => false,
    'rules' => [
        [
            'class' => 'app\components\rest\UrlRule',
            'controller' => require(__DIR__ . '/controllerList.php'),
            'pluralize' => false,
        ],

    ],
];