<?php
/**
 * 封装CLUB用户操作接口
 * User: wangzhen
 * Date: 2016/7/15
 * Time: 16:33
 */

namespace app\models\user;


use app\components\helper\HttpRequest;
use yii\base\Module;
class UserClub extends Module
{
    public static $url=__CLUBAPIURL__;
    public static $key = '9ab41cc1bbef27fa4b5b7d4cbe17a75a';
    public static function getRequest($path,$data)
    {
        $sign=md5(implode('',$data).self::$key);
        $url=self::$url."/doctorApp.interface.php?sign=$sign&command=";
        $curl=new HttpRequest($url.$path);
        $return = $curl->setData($data)->post();
        return json_decode($return,true);
    }

    /**
     * 验证登录是否成功
     * @param $username
     * @param $password
     * @return mixed
     */
    public static function loginValidate($username,$password)
    {
        $data['username']=$username;
        $data['password']=$password;
        return self::getRequest('login',$data);
    }
}