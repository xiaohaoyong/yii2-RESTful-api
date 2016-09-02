<?php

namespace app\models\user;

use Yii;

/**
 * This is the model class for table "user_ym_info".
 *
 * @property integer $user_id
 * @property string $user_name
 * @property integer $gender
 * @property string $photo
 * @property string $phone
 * @property string $introduce
 * @property integer $province
 * @property integer $city
 * @property integer $hospital
 * @property integer $hospital_level
 */
class UserInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_ym_info';
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
            [['user_id', 'user_name', 'gender', 'photo', 'phone', 'introduce'], 'required'],
            [['user_id', 'gender', 'phone', 'province', 'city', 'hospital', 'hospital_level'], 'integer'],
            [['user_name'], 'string', 'max' => 50],
            [['photo'], 'string', 'max' => 100],
            [['introduce'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('app', 'User ID'),
            'user_name' => Yii::t('app', 'User Name'),
            'gender' => Yii::t('app', '性别'),
            'photo' => Yii::t('app', '头像'),
            'phone' => Yii::t('app', 'Phone'),
            'introduce' => Yii::t('app', '简介'),
            'province' => Yii::t('app', '省'),
            'city' => Yii::t('app', '市'),
            'hospital' => Yii::t('app', 'Hospital'),
            'hospital_level' => Yii::t('app', 'Hospital Level'),
        ];
    }
    public function getUserRelational()
    {
        return $this->hasMany(UserRelational::className(), ['touserid' => 'user_id']);
    }
}
