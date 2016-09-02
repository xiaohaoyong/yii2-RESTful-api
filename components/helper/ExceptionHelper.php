<?php
/**
 * Created by PhpStorm.
 * User: xywy
 * Date: 2016/6/28
 * Time: 14:16
 */

namespace app\components\helper;
use app\components\helper\exception;
use yii\base;

/**
 * Class ExceptionHelper
 * @method static VersionError  \app\components\helper\exception\VersionError
 * @method static LoginError  \app\components\helper\exception\LoginError
 * @method static AccessDenied  \app\components\helper\exception\AccessDenied
 * @method static ExceptionCode  \app\components\helper\exception\ExceptionCode
 * @method static MissingArgument  \app\components\helper\exception\MissingArgument
 * @method static SignError  \app\components\helper\exception\SignError
 * @method static SystemFail  \app\components\helper\exception\SystemFail
 * @method static TokenError  \app\components\helper\exception\TokenError
 * @method static UserOAuth  \app\components\helper\exception\UserOAuth.php
 * @package app\components\helper
 */
class ExceptionHelper extends base\Exception
{
    /**
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public static function __callStatic($name, $arguments)
    {
        // TODO: Implement __callStatic() method.
        $className='app\components\helper\exception\\'.$name;

        if(class_exists($className))
        {
            $arguments[0]=$arguments[0]?$arguments[0]:[];
            return new $className($arguments[0]);
        }
    }

    public function __construct(exception\ExceptionCode $ExCode,$msg='')
    {
        $this->code=$ExCode->getCode();
        if(!$msg) {
            $this->message = $ExCode->getMessage();
        }else{
            $this->message = $msg;
        }
        $this->ext=$ExCode->getExt();
    }

}