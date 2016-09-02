<?php
/**
 * 模型父类
 * User: wangzhen
 * Date: 2016/7/1
 * Time: 14:57
 */

namespace app\models;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;


class VerificationModel extends ActiveRecord implements IdentityInterface
{
    public static function findIdentity($id){}
    public function getId(){}
    public function getAuthKey(){}
    public function validateAuthKey($authKey){}
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return $token;
    }
}