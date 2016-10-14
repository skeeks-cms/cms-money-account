<?php

namespace skeeks\cms\moneyAccount\models;

use skeeks\cms\models\CmsUser;
use skeeks\modules\cms\money\models\MoneyCurrency;
use Yii;
use yii\db\ActiveQuery;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%money_account}}".
 *
 * @property integer $id
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $user_id
 * @property string $value
 * @property string $currency_code
 * @property integer $is_active
 * @property string $description
 *
 * @property MoneyCurrency $currencyCode
 * @property CmsUser $user
 */
class MoneyAccount extends \skeeks\cms\models\Core
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%money_account}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            [['user_id'], 'default', 'value' => null],

            [['created_by', 'updated_by', 'created_at', 'updated_at', 'user_id', 'is_active'], 'integer'],
            [['value'], 'number'],
            [['currency_code'], 'required'],
            [['currency_code'], 'string', 'max' => 3],
            [['description'], 'string', 'max' => 255],
            [['currency_code', 'user_id'], 'unique', 'targetAttribute' => ['currency_code', 'user_id'],
                'message' => 'The combination of Account owner and Currency code has already been taken.',
                /*'filter' => function(ActiveQuery $activeQuery)
                {
                    print_r($activeQuery->createCommand()->rawSql);die;
                },*/
                'when' => function(self $model)
                {
                    return (bool) $model->user_id;
                }
            ],
            [['currency_code'], 'exist', 'skipOnError' => true, 'targetClass' => MoneyCurrency::className(), 'targetAttribute' => ['currency_code' => 'code']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => CmsUser::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => CmsUser::className(), 'targetAttribute' => ['updated_by' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => CmsUser::className(), 'targetAttribute' => ['user_id' => 'id']],

        ]);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'id' => Yii::t('skeeks/money-account', 'ID'),
            'created_by' => Yii::t('skeeks/money-account', 'Created By'),
            'updated_by' => Yii::t('skeeks/money-account', 'Updated By'),
            'created_at' => Yii::t('skeeks/money-account', 'Created At'),
            'updated_at' => Yii::t('skeeks/money-account', 'Updated At'),
            'user_id' => Yii::t('skeeks/money-account', 'Account owner'),
            'value' => Yii::t('skeeks/money-account', 'Amount of money'),
            'currency_code' => Yii::t('skeeks/money-account', 'Currency'),
            'is_active' => Yii::t('skeeks/money-account', 'Is Active'),
            'description' => Yii::t('skeeks/money-account', 'Description'),
        ]);
    }

    public function attributeHints()
    {
        return ArrayHelper::merge(parent::attributeHints(), [
            'description' => Yii::t('skeeks/money-account', 'A short description of the account'),
        ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCurrencyCode()
    {
        return $this->hasOne(MoneyCurrency::className(), ['code' => 'currency_code']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\Yii::$app->user->identityClass, ['id' => 'user_id']);
    }

    /**
     * @inheritdoc
     * @return MoneyAccountQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MoneyAccountQuery(get_called_class());
    }
}
