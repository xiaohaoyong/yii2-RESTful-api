<?php
/**
 * 404错误提醒
 * User: xywy
 * Date: 2016/6/23
 * Time: 17:56
 */

namespace app\components\error;

use yii\web;
class NotFoundHttpException extends web\NotFoundHttpException
{
    public function __construct($message = null, $code = 0, \Exception $previous = null)
    {
        parent::__construct('您来到火星啦，这里什么都没有哦！', 40001, $previous);
    }
}