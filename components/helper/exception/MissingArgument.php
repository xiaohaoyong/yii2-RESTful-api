<?php
/**
 * 缺少参数
 * User: wangzhen
 * Date: 2016/6/28
 * Time: 18:40
 */

namespace app\components\helper\exception;


class MissingArgument extends ExceptionCode
{
    public function init()
    {
        // TODO: Implement init() method.
        $this->code = 20001;
        $this->message = "缺少参数";
    }
}