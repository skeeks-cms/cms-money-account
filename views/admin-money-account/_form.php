<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 28.08.2015
 */
use yii\helpers\Html;
use skeeks\cms\modules\admin\widgets\form\ActiveFormUseTab as ActiveForm;

/* @var $this yii\web\View */
/* @var $model \skeeks\cms\moneyAccount\models\MoneyAccount */
?>


<?php $form = ActiveForm::begin(); ?>

<? if ($model->isNewRecord) : ?>
    <?= $form->field($model, 'user_id')->widget(
        \skeeks\cms\modules\admin\widgets\formInputs\SelectModelDialogUserInput::className()
    ); ?>

    <?= $form->fieldSelect($model, 'currency_code', \yii\helpers\ArrayHelper::map(
        \skeeks\modules\cms\money\models\MoneyCurrency::find()->active()->all(),
        'code',
        'code'
    )); ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => 255]); ?>
<? else : ?>
    <?= $form->field($model, 'value'); ?>
    <?= $form->field($model, 'description')->textInput(['maxlength' => 255]); ?>
<? endif; ?>



    <?= $form->buttonsStandart($model); ?>

<?php ActiveForm::end(); ?>
