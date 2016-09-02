<?php
/**
 * Created by PhpStorm.
 * User: wangzhen
 * Date: 2016/7/20
 * Time: 15:44
 */

namespace app\components\helper\exception;


class UserOAuth extends ExceptionCode
{
    public function init()
    {
        $this->code=30007;
        $this->message = "拿自己的钥匙开别人的门！！妄想！！";
    }
}