<?php
/**
 * Created by PhpStorm.
 * User: xywy
 * Date: 2016/6/23
 * Time: 9:42
 */

namespace app\components\base;
use app\components\helper\ExceptionHelper;
use Yii;
use yii\web\HttpException;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class Application extends \yii\web\Application
{
    private $version_number=[
        0=>'v4t3t4',
        1=>'v4t3t5',
        2=>'v5',
    ];
    public function createController($route)
    {
        $result = parent::createController($route);
        list ($id, $route) = explode('/', $route, 2);
        $v=array_search($id,$this->version_number);
        defined('YIMAI_VERSION') or define('YIMAI_VERSION',str_replace('t','.', $this->version_number[$v]));
        if(!$result){
            if (strpos($route, '/') !== false) {
                if($this->version_number[$v]!==false) {
                    $v = $v ? $v - 1 : 0;
                    $module = $this->getModule($this->version_number[$v]);
                    if ($module !== null) {
                        $result = $module->createController($route);
                    }
                }else{
                    throw new NotFoundHttpException('version is not!',404);
                }
            }

        }
        return $result;
    }
    public function handleRequest($request)
    {
        if (empty($this->catchAll)) {
            list ($route, $params) = $request->resolve();
        } else {
            $route = $this->catchAll[0];
            $params = $this->catchAll;
            unset($params[0]);
        }
        try {
            Yii::trace("Route requested: '$route'", __METHOD__);
            $this->requestedRoute = $route;
            $result = $this->runAction($route, $params);
            if ($result instanceof Response) {
                return $result;
            } else {
                $response = $this->getResponse();
                if ($result !== null) {
                    $response->data = $result;
                }

                return $response;
            }
        } catch (\Exception $e) {
            $response = $this->getResponse();
            $response->format = Response::FORMAT_JSON;
            if($e instanceof ExceptionHelper) {
                $response->data = [
                    'code' => $e->getCode(),
                    'message' => $e->getMessage(),
                ];
                if ($e->ext) {
                    $response->data['ext'] = $e->ext;
                }
            }elseif($e instanceof HttpException){
                if($e->statusCode>=400 && $e->statusCode<500){
                    $response->data['code']=40000+$e->statusCode;
                }else{
                    $response->data['code']=50000+$e->statusCode;
                }
                $response->data['message']=$e->getMessage();
            }else{
                throw $e;
                $response->data['code']=60000;
                $response->data['message']='系统错误';
                if(YII_DEBUG and false) {
                    $response->data['getCode']=$e->getCode();
                    $response->data['getFile']=$e->getFile();
                    $response->data['getLine']=$e->getLine();
                    $response->data['getMessage']=$e->getMessage();
                    $response->data['getPrevious']=$e->getPrevious();
                    $response->data['getTrace']=$e->getTrace();
                    $response->data['getTraceAsString']=$e->getTraceAsString();
                }
            }
            return $response;
        }
    }
}
