<?php
error_reporting(0);
$XYWYSRVCONFIG = parse_ini_file(__DIR__.'/../system/XYWYSRV_CONFIG');
$_SERVER['REQUEST_URI']=str_replace('.','t',$_SERVER['REQUEST_URI']);

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');
require(__DIR__ . '/../config/rediskey.php'); //redis key 字典

//目录配置
define('__ROOT__', dirname(dirname(__FILE__)));
define('APPLICATION_NAME', basename(__ROOT__));
//数据根目录
define("APPLICATION_ROOT_PATH", "/data/webroot/");
//程序代码文件目录
define("APPLICATION_PATH", APPLICATION_ROOT_PATH . 'htdocs/' . APPLICATION_NAME . "/");
//程序代码脚本目录，存放可执行脚本，主要用于crontab定时任务，数据库，缓存等参数配置文件也在此目录
define("SYSTEM_PATH", APPLICATION_PATH . "system/");


//加载常量字典
if (APPLICATION_NAME == 'test.api.yimai.xywy.com') {
    require(__DIR__ . '/../config/constant_test.php'); //常量 字典
}elseif(APPLICATION_NAME == 'api.yimai.xywy.com')
{
    if ($_SERVER['SERVER_ADDR'] == '10.20.3.8' || $_SERVER['SERVER_ADDR'] == '10.20.3.1') {
        require(__DIR__ . '/../config/constant_pre.php'); //常量 字典
    }elseif($_SERVER['SERVER_ADDR'] == '127.0.0.1') {

    }else{
        require(__DIR__ . '/../config/constant.php'); //常量 字典
    }
}

$config = require(__DIR__ . '/../config/web.php');
Yii::setAlias('@app',dirname(__DIR__));
(new \app\components\base\Application($config))->run();
