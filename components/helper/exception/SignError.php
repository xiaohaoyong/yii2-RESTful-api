<?php
/**
 * sign错误返回提示
 * User: wangzhen
 * Date: 2016/6/28
 * Time: 18:49
 */

namespace app\components\helper\exception;


class SignError extends ExceptionCode
{
    public function init()
    {
        // TODO: Implement init() method.
        $this->code = 30001;
        $this->message = "sign is incorrect";
    }
}