<?php
/**
 * sign验证
 * User: wangzhen
 * Date: 2016/7/5
 * Time: 17:40
 */

namespace app\components\helper;
use Yii;
use yii\filters\auth\AuthMethod;

class SignVerification extends AuthMethod
{
    /**
     * @var string
     * 秘钥
     */
    private static $secretKey="2e6e992ea705f9ced0496d135b42fde0";

    /**
     *
     * 验证规则：
     * 版本+控制器+参数（字母排序）+秘钥+请求类型
     * @inheritdoc
     */
    public function authenticate($user, $request, $response)
    {
        $get=$request->get();
        unset($get['sign']);
        $resources=array_merge($get,$request->post());
        $res="";
        if($resources){
            asort($resources);
            $res=implode("@#",$resources);
        }
        $sign=md5(YIMAI_VERSION.Yii::$app->controller->id.$res.self::$secretKey.$request->getMethod());
        if($request->get('sign')!=$sign)
        {
            echo $sign;
            throw new ExceptionHelper(ExceptionHelper::SignError());
        }
        return true;
    }

    /**
     * @inheritdoc
     */
    public function challenge($response)
    {
    }
}