<?php

namespace app\modules\v4t3t5;
/**
 * v4t3t5 module definition class
 */
class v4t3t5 extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\v4t3t5\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->modules = [
            'v4t3t4' => [
                // 此处应考虑使用一个更短的命名空间
                'class' => 'app\modules\v4t3t4\v4t3t4',
            ],
        ];
        // custom initialization code goes here
    }
}
