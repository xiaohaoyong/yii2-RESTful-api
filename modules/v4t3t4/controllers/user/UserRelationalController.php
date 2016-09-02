<?php
/**
 * 用户关系
 * User: wangzhen
 * Date: 2016/7/21
 * Time: 11:05
 */

namespace app\modules\v4t3t4\controllers\user;


use app\controllers\CommonController;
use app\controllers\VerificationController;
use app\models\user\UserInfo;
use app\models\user\UserRelational;
use yii\db\ActiveRecord;
use yii\data\ActiveDataProvider;

class UserRelationalController extends CommonController
{
    public $modelClass = 'app\models\user\UserRelational';

    //覆盖默认方法
    public function actions()
    {
        $actions=parent::actions();
        unset($actions['index']);
        unset($actions['view']);
        return $actions;
    }
    public function actionIndex()
    {
        $type=\Yii::$app->request->get('type');
        $userid=\Yii::$app->request->get('userid');

//        $where['userid']=$userid;
//        $type?$where['tousertype']=$type:'';
//        return UserRelational::findAll($where);

        return new ActiveDataProvider([
            'query' => UserRelational::find(),
        ]);
    }

    public function actionView($id)
    {
        $type=\Yii::$app->request->get('type');

        $where['userid']=$id;
        $type?$where['tousertype']=$type:'';
        return UserRelational::findAll($where);
    }
}