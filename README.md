Financial accounts users of the site, write-off and recharge.
===================================

Info
------------

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist skeeks/cms-user-balance "*"
```

or add

```
"skeeks/cms-user-balance": "*"
```

Configuration app
----------

```php

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
                    'skeeks/dadata-balance' => 'main.php',
                ],
            ]
        ]
    ]
],
'modules' =>
[
    'userBalance' => [
        'class'         => 'skeeks\cms\userBalance\CmsUserBalanceModule',
    ]
]

```


##Links
* [Web site](http://en.cms.skeeks.com)
* [Web site (rus)](http://cms.skeeks.com)
* [Author](http://skeeks.com)
* [ChangeLog](https://github.com/skeeks-cms/cms-user-balance/blob/master/CHANGELOG.md)


___

> [![skeeks!](https://gravatar.com/userimage/74431132/13d04d83218593564422770b616e5622.jpg)](http://skeeks.com)  
<i>SkeekS CMS (Yii2) — quickly, easily and effectively!</i>  
[skeeks.com](http://skeeks.com) | [en.cms.skeeks.com](http://en.cms.skeeks.com) | [cms.skeeks.com](http://cms.skeeks.com) | [marketplace.cms.skeeks.com](http://marketplace.cms.skeeks.com)


