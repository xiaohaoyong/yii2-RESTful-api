<?php

namespace app\modules\v4t3t4\controllers;

use yii\web\Controller;

/**
 * Default controller for the `v4t3t4` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
