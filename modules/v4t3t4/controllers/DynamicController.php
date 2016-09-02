<?php
/**
 * Created by PhpStorm.
 * User: wangzhen
 * Date: 2016/7/12
 * Time: 10:11
 */

namespace app\modules\v4t3t4\controllers;


use app\controllers\CommonController;


class DynamicController extends CommonController
{
    public $modelClass = 'app\models\UserModel';

    public function actionIndex()
    {
        return __METHOD__;
    }
}