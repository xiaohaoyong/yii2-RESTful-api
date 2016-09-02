<?php
/**
 * 控制器列表
 * User: wangzhen
 * Date: 2016/7/12
 * Time: 14:46
 */


$controller=[
    'dynamic',
    'dynamic/test-user',
    'user',
    'user/user-login',
    'user/user-relational'
];

$yimai_version=require(__DIR__."/version_number.php");
$con=[];
foreach($yimai_version as $k=>$v)
{
    foreach($controller as $ck=>$cv)
    {
        $con[]=$v."/".$cv;
    }
}
return $con;