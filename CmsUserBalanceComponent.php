<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 14.10.2016
 */
namespace skeeks\cms\userBalance;
use skeeks\cms\base\Component;
use Yii;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/**
 * Class CmsUserBalanceComponent
 *
 * @package skeeks\cms\dadataSuggest
 */
class CmsUserBalanceComponent extends Component
{
    /**
     * @return array
     */
    static public function descriptorConfig()
    {
        return array_merge(parent::descriptorConfig(), [
            'name'          => \Yii::t('skeeks/user-balance', 'User balance'),
        ]);
    }


    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            ['authorization_token', 'string'],
        ]);
    }

    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'authorization_token' => \Yii::t('skeeks/dadata-suggest', 'Authorization token'),
        ]);
    }

    public function attributeHints()
    {
        return ArrayHelper::merge(parent::attributeHints(), [
            'authorization_token' => \Yii::t('skeeks/dadata-suggest', 'https://dadata.ru/api/'),
        ]);
    }

    public function renderConfigForm(ActiveForm $form)
    {
        echo $form->fieldSet(\Yii::t('skeeks/dadata-suggest', 'Settings'));

            //echo $form->field($this, 'authorization_token');

        echo $form->fieldSetEnd();
    }
}