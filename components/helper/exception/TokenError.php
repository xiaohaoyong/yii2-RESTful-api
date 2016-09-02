<?php
/**
 * 用户身份验证失败返回提示
 * User: wangzhen
 * Date: 2016/6/28
 * Time: 18:50
 */

namespace app\components\helper\exception;


class TokenError extends ExceptionCode
{
    public function init()
    {
        // TODO: Implement init() method.
        $this->code = 30002;
        $this->message = "token is incorrect";
    }
}