<?php
namespace app\components\helper\exception;
use yii\base\InvalidConfigException;
use yii\base\Object;
/**
 * 异常结构化数据
 * User: wangzhen
 * Date: 2016/6/28
 * Time: 17:53
 */
abstract class ExceptionCode extends Object
{
    protected $code;
    protected $message;
    protected $ext;
    public function __construct(array $config)
    {
        parent::__construct($config);

    }

    public function init()
   {
       throw new InvalidConfigException('s',500);
   }

    /**
     * 获取code
     * @return mixed
     * @throws InvalidConfigException
     */
    public function getCode()
    {
        if(!$this->code)
        {
            throw new InvalidConfigException('code未定义',500);
        }
        return $this->code;
    }
    public function getMessage()
    {
        if(!$this->message)
        {
            throw new InvalidConfigException('message未定义',500);
        }
        return $this->message;
    }
    public function getExt()
    {
        return $this->ext;
    }


    public function setCode($code)
    {
        $this->code=$code;
    }
    public function setMessage($message)
    {
        $this->message=$message;
    }
    public function setExt($ext)
    {
        $this->ext=$ext;
    }
}