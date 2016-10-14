<?php

namespace skeeks\cms\moneyAccount\models;

/**
 * This is the ActiveQuery class for [[MoneyAccount]].
 *
 * @see MoneyAccount
 */
class MoneyAccountQuery extends \yii\db\ActiveQuery
{
    public function active()
    {
        return $this->andWhere('[[is_active]]=1');
    }

    /**
     * @inheritdoc
     * @return MoneyAccount[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MoneyAccount|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
