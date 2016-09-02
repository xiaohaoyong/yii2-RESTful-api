<?php

namespace app\models\subscription;

use Yii;

/**
 * This is the model class for table "subscription".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $type
 * @property integer $level
 * @property integer $addtime
 * @property string $img
 * @property integer $attr
 */
class Subscription extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subscription';
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
            [['id', 'name', 'description', 'img'], 'required'],
            [['id', 'type', 'level', 'addtime', 'attr'], 'integer'],
            [['name'], 'string', 'max' => 20],
            [['description'], 'string', 'max' => 255],
            [['img'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'type' => Yii::t('app', 'Type'),
            'level' => Yii::t('app', 'Level'),
            'addtime' => Yii::t('app', 'Addtime'),
            'img' => Yii::t('app', 'Img'),
            'attr' => Yii::t('app', 'Attr'),
        ];
    }
}
