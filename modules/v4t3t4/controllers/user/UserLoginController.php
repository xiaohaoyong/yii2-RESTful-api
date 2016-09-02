<?php
/**
 * 用户登录操作控制器
 * User: wangzhen
 * Date: 2016/7/15
 * Time: 16:22
 */
namespace app\modules\v4t3t4\controllers\user;

use app\components\helper\ExceptionHelper;
use app\controllers;
use app\models\user\UserLogin;


class UserLoginController extends controllers\VerificationController
{
    public $modelClass = 'app\models\user\UserLogin';

    //覆盖默认方法
    public function actions()
    {
        return [];
    }

    public function actionIndex()
    {
        $model=new UserLogin(\Yii::$app->request->get());
        if (!$token=$model->login()) {
            throw new ExceptionHelper(ExceptionHelper::BusinessFail(['message'=>'登录失败']));
        }
        return ['token'=>$token,'user'=>\Yii::$app->user->identity];
    }
    public  function actionUpdate()
    {

    }
}