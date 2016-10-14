<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 14.10.2016
 */ 
use yii\db\Schema;
use yii\db\Migration;

class m161014_120601_create_table__money_account_transaction extends Migration
{
    public function safeUp()
    {
        $tableExist = $this->db->getTableSchema("{{%money_account_transaction}}", true);
        if ($tableExist)
        {
            return true;
        }

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable("{{%money_account_transaction}}", [
            'id'                    => $this->primaryKey(),

            'created_by'            => $this->integer(),
            'updated_by'            => $this->integer(),

            'created_at'            => $this->integer(),
            'updated_at'            => $this->integer(),

            'money_account_id'      => $this->integer()->notNull(),

            'amount'                => $this->decimal(18, 4)->notNull()->defaultValue(0)->comment('Amount of transaction'),
            'is_debit'              => $this->integer(1)->notNull()->defaultValue(0)->comment('Deposit or cancellation accounts'),

            'description'           => $this->string(255)->comment('Description'),

        ], $tableOptions);


        $this->createIndex('updated_by', '{{%money_account_transaction}}', 'updated_by');
        $this->createIndex('created_by', '{{%money_account_transaction}}', 'created_by');
        $this->createIndex('created_at', '{{%money_account_transaction}}', 'created_at');
        $this->createIndex('updated_at', '{{%money_account_transaction}}', 'updated_at');

        $this->createIndex('money_account_id', '{{%money_account_transaction}}', 'money_account_id');

        $this->createIndex('amount', '{{%money_account_transaction}}', 'amount');
        $this->createIndex('is_debit', '{{%money_account_transaction}}', 'is_debit');

        $this->addCommentOnTable('{{%money_account_transaction}}', 'Money account transactions');

        $this->addForeignKey(
            'money_account_transaction__created_by', "{{%money_account_transaction}}",
            'created_by', '{{%cms_user}}', 'id', 'SET NULL', 'SET NULL'
        );

        $this->addForeignKey(
            'money_account_transaction__updated_by', "{{%money_account_transaction}}",
            'updated_by', '{{%cms_user}}', 'id', 'SET NULL', 'SET NULL'
        );

        $this->addForeignKey(
            'money_account_transaction__user_id', "{{%money_account_transaction}}",
            'user_id', '{{%cms_user}}', 'id', 'SET NULL', 'SET NULL'
        );

        $this->addForeignKey(
            'money_account_transaction__money_account_id', "{{%money_account_transaction}}",
            'currency_code', '{{%money_account_id}}', 'id', 'CASCADE', 'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey("money_account_transaction__updated_by", "{{%money_account_transaction}}");
        $this->dropForeignKey("money_account_transaction__updated_by", "{{%money_account_transaction}}");
        $this->dropForeignKey("money_account_transaction__user_id", "{{%money_account_transaction}}");
        $this->dropForeignKey("money_account_transaction__money_account_id", "{{%money_account_transaction}}");

        $this->dropTable("{{%money_account_transaction}}");
    }
}