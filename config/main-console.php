<?php
return [
    'components' =>
    [
        'userBalance' => [
            'class'             => 'skeeks\cms\userBalance\CmsUserBalanceComponent',
        ],

        'i18n' => [
            'translations' =>
            [
                'skeeks/user-balance' => [
                    'class'             => 'yii\i18n\PhpMessageSource',
                    'basePath'          => '@skeeks/cms/userBalance/messages',
                    'fileMap' => [
                        'skeeks/user-balance' => 'main.php',
                    ],
                ]
            ]
        ]
    ],

    'modules' =>
    [
        'userBalance' => [
            'class'                 => 'skeeks\cms\userBalance\CmsUserBalanceModule',
            'controllerNamespace'   => 'skeeks\cms\userBalance\console\controllers'
        ]
    ]
];
