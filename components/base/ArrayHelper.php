<?php
/**
 * Created by PhpStorm.
 * User: wangzhen
 * Date: 2016/7/21
 * Time: 17:38
 */

namespace app\components\base;


use yii\base\Arrayable;
use yii\helpers\BaseArrayHelper;

class ArrayHelper extends BaseArrayHelper
{
    public static function toArray($object, $properties = [], $recursive = true)
    {
        if (is_object($object) && empty($properties[get_class($object)]) && !($object instanceof Arrayable)) {
            $result = [];
            foreach ($object as $key => $value) {
                $result[$key] = $value;
            }
            if (empty($result)) {
                return $object;
            }
        }
        return parent::toArray($object, $properties, $recursive);
    }
}