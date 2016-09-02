<?php
namespace app\models\user;

use Yii;

/**
 * This is the model class for table "user_ym_token".
 *
 * @property string $user_id
 * @property string $token
 * @property integer $updatetime
 */
class UserToken extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_ym_token';
    }
    public static function primaryKey()
    {
        return ['user_id'];
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
            [['user_id', 'token'], 'required'],
            [['user_id', 'updatetime'], 'integer'],
            [['token'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('app', 'User ID'),
            'token' => Yii::t('app', 'Token'),
            'updatetime' => Yii::t('app', 'Updatetime'),
        ];
    }
}
