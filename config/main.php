<?php
return [
    'components' =>
    [
        'moneyAccount' => [
            'class'             => 'skeeks\cms\moneyAccount\MoneyAccountComponent',
        ],

        'i18n' => [
            'translations' =>
            [
                'skeeks/money-account' => [
                    'class'             => 'yii\i18n\PhpMessageSource',
                    'basePath'          => '@skeeks/cms/moneyAccount/messages',
                    'fileMap' => [
                        'skeeks/money-account' => 'main.php',
                    ],
                ]
            ]
        ]
    ],

    'modules' =>
    [
        'moneyAccount' => [
            'class'                 => 'skeeks\cms\moneyAccount\MoneyAccountModule',
        ]
    ]
];
