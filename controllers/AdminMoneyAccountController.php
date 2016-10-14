<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 15.04.2016
 */
namespace skeeks\cms\moneyAccount\controllers;
use skeeks\cms\modules\admin\controllers\AdminModelEditorController;
use skeeks\cms\moneyAccount\models\MoneyAccount;

/**
 * Class AdminExportTaskController
 * @package skeeks\cms\export\controllers
 */
class AdminMoneyAccountController extends AdminModelEditorController
{
    public function init()
    {
        $this->name                 = \Yii::t('skeeks/money-account', 'Money accounts');
        $this->modelShowAttribute   = "id";
        $this->modelClassName       = MoneyAccount::className();
    }
}
