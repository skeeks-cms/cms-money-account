<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 09.08.2016
 */

/* @var $this yii\web\View */
/* @var $searchModel common\models\searchs\Game */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>

<?
$query = $dataProvider->query;

$filter = new \yii\base\DynamicModel([
    'id',
]);
$filter->addRule('id', 'integer');

$filter->load(\Yii::$app->request->get());

if ($filter->id)
{
    $query->andWhere(['id' => $filter->id]);
}

?>

<? $form = \skeeks\cms\modules\admin\widgets\filters\AdminFiltersForm::begin([
    'action' => '/' . \Yii::$app->request->pathInfo,
]); ?>

    <?= $form->field($filter, 'id')->label('ID')->setVisible(); ?>

    <?= $form->field($searchModel, 'user_id')->widget(
        \skeeks\cms\modules\admin\widgets\formInputs\SelectModelDialogUserInput::className()
    ); ?>

    <?= $form->field($searchModel, 'currency_code')->listBox(
        \yii\helpers\ArrayHelper::merge([null => '-'], \yii\helpers\ArrayHelper::map(
            \skeeks\modules\cms\money\models\MoneyCurrency::find()->all(),
            'code', 'code'
        )),
        [
            'size' => 1
        ]
    ); ?>

<? $form::end(); ?>
