<?php
/**
 * 用户登录模型.
 * User: wangzhen
 * Date: 2016/7/15
 * Time: 15:52
 */
namespace app\models\user;

use app\components\helper\ExceptionHelper;
use yii\web\IdentityInterface;

class UserLogin extends User
{
    public $username;
    public $password;
    public $user_id;
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }
    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        $return = UserClub::loginValidate($this->username, $this->password);
        if ($return['code'] < 0) {
            $a['code']=$return['code'];
            $a['message']=$return['msg'];
            throw new ExceptionHelper(ExceptionHelper::LoginError($a));
        }
        $this->user_id=$return['data'];
    }


    /**
     * Logs in a user using the provided username and password.
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return User::setIdentityByAccessToken($this->user_id);
        }
        return false;
    }
}