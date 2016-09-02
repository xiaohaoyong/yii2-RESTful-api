<?php
/**
 * Created by PhpStorm.
 * User: wangzhen
 * Date: 2016/7/12
 * Time: 10:11
 */

namespace app\modules\v4t3t4\controllers\dynamic;


use app\controllers\CommonController;
use app\controllers\VerificationController;
use app\models\user\User;
use app\models\user\UserToken;


class TestUserController extends VerificationController
{
    public $modelClass = 'app\models\user\User';

    public function actionIndex()
    {
//        $userToken=UserToken::findOne(['token'=>'4e9bbdf452d0c988b224ace0f7b29e0c']);
//        var_dump($userToken);
//        exit;
       // $userToken=UserToken::findOne(['token'=>'1904d5e28f27a0a0ade00449706e6f2a']);
       // $userToken=UserToken::findOne(20437);exit;
        //User::setIdentityByAccessToken(8672223);
        //return __METHOD__;
    }
}