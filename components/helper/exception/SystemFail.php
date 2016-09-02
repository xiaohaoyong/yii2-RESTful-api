<?php
/**
 * 系统错误
 * 用于验证码判断，token判断等
 * User: wangzhen
 * Date: 2016/6/28
 * Time: 18:47
 */

namespace app\components\helper\exception;


class SystemFail extends ExceptionCode
{
    public function init()
    {
        // TODO: Implement init() method.
        $this->code = 30000;
        $this->message = "system error";
    }
}