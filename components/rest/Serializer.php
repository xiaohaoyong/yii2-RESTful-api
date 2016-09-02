<?php
/**
 * Created by PhpStorm.
 * User: xywy
 * Date: 2016/6/24
 * Time: 10:53
 */

namespace app\components\rest;

use yii\rest;
use Yii;
use yii\base\Arrayable;
use yii\base\Model;
use yii\data\DataProviderInterface;


class Serializer extends rest\Serializer
{
    /**
     * @param \yii\data\DataProviderInterface $dataProvider
     * @继承自父类，重新定义返回值方式
     */
    public function serialize($data)
    {
        if ($data instanceof Model && $data->hasErrors()) {
            return $this->serializeModelErrors($data);
        } elseif ($data instanceof Arrayable) {
            return $this->serializeModel($data);
        } elseif ($data instanceof DataProviderInterface) {
            return $this->serializeDataProvider($data);
        } else {
            return $data;
        }
    }
}