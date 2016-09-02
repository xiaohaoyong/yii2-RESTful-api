<?php

namespace app\models\user;

use app\components\base\ActiveRecord;
use app\models\subscription\Subscription;
use Yii;
use yii\base\Object;

/**
 * 用户关系表.
 *
 * @property string $id
 * @property string $userid
 * @property string $touserid
 * @property string $createtime
 * @property integer $tousertype
 */
class UserRelational extends ActiveRecord
{
    private  $fieldAll = true;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_relational';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('dbud');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userid', 'touserid', 'createtime', 'tousertype'], 'integer'],
            [['userid', 'touserid'], 'unique', 'targetAttribute' => ['userid', 'touserid'], 'message' => 'The combination of 主动用户 and 被动用户 has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', '主键'),
            'userid' => Yii::t('app', '主动用户'),
            'touserid' => Yii::t('app', '被动用户'),
            'createtime' => Yii::t('app', '添加时间'),
            'tousertype' => Yii::t('app', '1普通2服务3媒体'),
        ];
    }
    public function fields()
    {
        return [
            'id',
            'userid',
            'touserid',
            'touser'=>function()
            {
                if($this->tousertype==0) {
                    $ob = UserInfo::findOne(['user_id' => $this->touserid]);
                }else{
                    $ob = Subscription::findOne(['id' => $this->touserid]);
                }
                return $ob?$ob:new \stdClass();
            },
            'createtime'=>function(){
                return date('Y-m-d H:i:s',$this->createtime);
            },
        ];
    }

    public function beforeSave($insert)
    {
        if($this->getIsNewRecord())
        {
            $this->createtime=time();
        }
        //判断用户类型 如果为公众号 则修改被关注用户类型
        $row=Subscription::findOne($this->touserid);
        if($row && $row['type']==3)
        {
            $this->tousertype=3;
        }elseif($row){
            $this->tousertype=2;
        }else{
            $this->tousertype=1;
        }
        return parent::beforeSave($insert);
    }
}
