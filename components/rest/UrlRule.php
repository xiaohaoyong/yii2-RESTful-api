<?php
/**
 * Created by PhpStorm.
 * User: wangzhen
 * Date: 2016/7/12
 * Time: 16:16
 */

namespace app\components\rest;


use yii\web\CompositeUrlRule;

class UrlRule extends \yii\rest\UrlRule
{
    public function init()
    {
        $controllers = [];
        foreach ((array) $this->controller as $urlName => $controller) {
            if (is_int($urlName)) {
                $urlName = $this->pluralize ? Inflector::pluralize($controller) : $controller;
            }
            $controllers[$urlName] = $controller;
        }
        $this->controller = $controllers;

        $this->prefix = trim($this->prefix, '/');
        CompositeUrlRule::init();
    }
}