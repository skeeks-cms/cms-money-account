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
        "img"       => ['skeeks\cms\moneyAccount\assets\UserBalanceAsset', 'icons/money-bag.png'],
        'priority'  => 300,

        'items' =>
        [
            [
                'label' => \Yii::t('skeeks/money-account', 'User accounts'),
                "img"       => ['skeeks\cms\moneyAccount\assets\UserBalanceAsset', 'icons/accounting-book.png'],
                'priority'  => 100,
                "url"       => ["comments/admin-comment"],
            ],

            [
                'label' => \Yii::t('skeeks/money-account', 'User accounts'),
                "img"       => ['skeeks\cms\moneyAccount\assets\UserBalanceAsset', 'icons/accounting-book.png'],
                'priority'  => 250,

                "url"       => ["comments/admin-comment"],

                'items' =>
                [
                    [
                        'priority'  => 0,
                        'label' => \Yii::t('skeeks/comments', 'Comments'),
                        "url"       => ["comments/admin-comment"],
                        "img"       => ['skeeks\cms\moneyAccount\assets\UserBalanceAsset', 'images/comments.jpg'],
                    ],
                ]
            ]
        ]
    ]
];
