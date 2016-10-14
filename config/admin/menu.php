<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 26.06.2016
 */
return [
    'finance' =>
    [
        'label' => \Yii::t('skeeks/money-account', 'Finance'),
        "img"       => ['skeeks\cms\moneyAccount\assets\MoneyAccountAsset', 'icons/money-bag.png'],
        'priority'  => 300,

        'items' =>
        [
            [
                'label' => \Yii::t('skeeks/money-account', 'Money accounts'),
                "img"       => ['skeeks\cms\moneyAccount\assets\MoneyAccountAsset', 'icons/accounting-book.png'],
                'priority'  => 100,

                'items' =>
                [
                    [
                        'label' => \Yii::t('skeeks/money-account', 'Money accounts'),
                        "img"       => ['skeeks\cms\moneyAccount\assets\MoneyAccountAsset', 'icons/accounting-book.png'],
                        'priority'  => 100,
                        "url"       => ["moneyAccount/admin-money-account"],
                    ],

                    [
                        'label' => \Yii::t('skeeks/money-account', 'Transactions'),
                        "img"       => ['skeeks\cms\moneyAccount\assets\MoneyAccountAsset', 'icons/transfer.png'],
                        'priority'  => 100,
                        "url"       => ["comments/admin-comment"],
                    ],
                ],
            ],

        ]
    ]
];
