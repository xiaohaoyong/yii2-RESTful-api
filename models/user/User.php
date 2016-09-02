<?php
/**
 * 用户模型
 * User: wangzhen
 * Date: 2016/7/15
 * Time: 16:00
 */

namespace app\models\user;


use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord  implements IdentityInterface
{
    private static $_user;
    public static function findIdentity($id){}
    public function getId(){
        return $this->user_id;
    }
    public function getAuthKey(){}
    public function validateAuthKey($authKey){}
    public static function findIdentityByAccessToken($token, $type = null)
    {
        $userToken=UserToken::findOne(['token'=>$token]);
        if($userToken) {
            return self::findOne($userToken->user_id);
        }
    }
    public static function primaryKey()
    {
        return ['user_id'];
    }

    /**
     * 设置用户token
     * @param $userid
     * @return string
     */
    public static function  setIdentityByAccessToken($userid)
    {
        $token=md5($userid.time());
        if(!$userToken=UserToken::findOne($userid))
        {
            $userToken = new UserToken();
        }
        $userToken->token=$token;
        $userToken->user_id=$userid;
        $userToken->updatetime=time();
        $userToken->save();
        return $token;
    }

    public static function getDb()
    {
        return \YII::$app->dbud;
    }
    /**
     * @return string 返回该AR类关联的数据表名
     */
    public static function tableName()
    {
        return 'user_ym_main';
    }
    public function getToken()
    {
        return $this->hasOne(UserToken::className(), ['user_id' => 'user_id']);
    }
}