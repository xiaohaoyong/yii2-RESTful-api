<?php
/**
 * 重定义token验证报错
 * User: wangzhen
 * Date: 2016/7/20
 * Time: 13:54
 */

namespace app\components\base;


use app\components\helper\ExceptionHelper;

class HttpBearerAuth extends \yii\filters\auth\HttpBearerAuth
{
    protected function isActive($action)
    {
        $id=$action->controller->id."/".$this->getActionId($action);
        return !in_array($id, $this->except, true) && (empty($this->only) || in_array($id, $this->only, true));
    }

    public function handleFailure($response)
    {
        throw new ExceptionHelper(ExceptionHelper::TokenError());
    }

}