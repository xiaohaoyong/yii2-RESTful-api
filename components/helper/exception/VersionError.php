<?php
/**
 * Created by PhpStorm.
 * User: wangzhen
 * Date: 2016/6/28
 * Time: 18:52
 */

namespace app\components\helper\exception;


class VersionError extends ExceptionCode
{
    public function init()
    {
        // TODO: Implement init() method.
        $this->code = 30003;
        $this->message = "版本过低请更新您的客户端！";
        $this->ext=['updatelink'=>UPDATELINK];
    }
}