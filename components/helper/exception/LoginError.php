<?php
/**
 * 拒绝访问
 * 如：答题相关接口需要兼职医生不是兼职医生的需要使用该提示
 * 删除动态，判断当前动态是否属于该用户，修改话题等等
 * User: wangzhen
 * Date: 2016/6/28
 * Time: 18:44
 */

namespace app\components\helper\exception;


class LoginError extends ExceptionCode
{
    public function init()
    {
    }

    public function setCode($code)
    {
        if($code==-1)
        {
            $this->code=20003;
        }elseif($code==-2){
            $this->code=20004;
        }elseif($code==-3){
            $this->code=20005;
        }
    }


}