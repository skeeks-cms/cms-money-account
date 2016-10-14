<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 21.09.2015
 */
namespace skeeks\cms\moneyAccount\assets;
use skeeks\cms\base\AssetBundle;

/**
 * Class MoneyAccountAsset
 *
 * @package skeeks\cms\moneyAccount\assets
 */
class MoneyAccountAsset extends AssetBundle
{
    public $sourcePath = '@skeeks/cms/moneyAccount/assets/src';

    public $css = [];
    public $js = [];
    public $depends = [];
}
