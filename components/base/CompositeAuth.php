<?php
/**
 * 重定义CompositeAuth
 * User: wangzhen
 * Date: 2016/8/17
 * Time: 13:54
 */

namespace app\components\base;
use app\components\helper\ExceptionHelper;
use yii\base\InvalidConfigException;
use yii\filters\auth\AuthInterface;

class CompositeAuth extends \yii\filters\auth\CompositeAuth
{
    /**
     * @inheritdoc
     */
    public function authenticate($user, $request, $response)
    {
        foreach ($this->authMethods as $i => $auth) {
            if($this->except[$auth])
            if (!$auth instanceof AuthInterface) {
                $this->authMethods[$i] = $auth = \Yii::createObject($auth);
                if (!$auth instanceof AuthInterface) {
                    throw new InvalidConfigException(get_class($auth) . ' must implement yii\filters\auth\AuthInterface');
                }
            }

            $identity = $auth->authenticate($user, $request, $response);
            if ($identity !== null) {
                return $identity;
            }else{
                $auth->handleFailure($response);
            }
        }
        return null;
    }

    protected function isActive($action)
    {
        $id=$action->controller->id."/".$this->getActionId($action);
        return !in_array($id, $this->except, true) && (empty($this->only) || in_array($id, $this->only, true));
    }
}
