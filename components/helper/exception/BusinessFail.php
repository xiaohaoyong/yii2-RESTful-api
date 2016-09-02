<?php
/**
 * 操作错误提示
 * 用户业务层面的判断 如访问权限，参数验证等
 * User: xywy
 * Date: 2016/6/28
 * Time: 17:58
 */

namespace app\components\helper\exception;


class BusinessFail extends ExceptionCode
{
    public function init()
    {
        // TODO: Implement init() method.
        $this->code=$this->code?$this->code:20000;
        $this->message=$this->message?$this->message:"操作失败";
    }
}