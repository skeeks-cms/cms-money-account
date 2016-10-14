<?php

/* @var $this yii\web\View */
?>

<? $pjax = \skeeks\cms\modules\admin\widgets\Pjax::begin(); ?>

    <?php echo $this->render('_search', [
        'searchModel'   => $searchModel,
        'dataProvider'  => $dataProvider
    ]); ?>

    <?= \skeeks\cms\modules\admin\widgets\GridViewStandart::widget([
        'dataProvider'      => $dataProvider,
        'filterModel'       => $searchModel,
        'pjax'              => $pjax,
        'adminController'   => $controller,
        'columns' =>
        [
            'id',
            'value',
            [
                'class'     => \yii\grid\DataColumn::className(),
                'filter'    => \yii\helpers\ArrayHelper::map(\skeeks\modules\cms\money\models\MoneyCurrency::find()->all(), 'id', 'code'),
                'attribute' => 'currency_code',
            ],
            [
                'class'     => \skeeks\cms\grid\UserColumnData::className(),
                'attribute' => 'user_id',
            ],
            'description',
        ]

    ]); ?>

<? $pjax::end() ?>
