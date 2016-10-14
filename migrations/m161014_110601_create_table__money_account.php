<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 14.10.2016
 */ 
use yii\db\Schema;
use yii\db\Migration;

class m161014_110601_create_table__money_account extends Migration
{
    public function safeUp()
    {
        $tableExist = $this->db->getTableSchema("{{%money_account}}", true);
        if ($tableExist)
        {
            return true;
        }

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable("{{%money_account}}", [
            'id'                    => $this->primaryKey(),

            'created_by'            => $this->integer(),
            'updated_by'            => $this->integer(),

            'created_at'            => $this->integer(),
            'updated_at'            => $this->integer(),

            'user_id'               => $this->integer()->comment('Account owner'),

            'amount'                 => $this->decimal(18, 4)->notNull()->defaultValue(0)->comment('Amount of money'),
            'currency_code'         => $this->string(3)->notNull()->comment('Currency code'),

            'is_active'             => $this->integer(1)->notNull()->defaultValue(1),

            'description'           => $this->string(255)->comment('Short description'),

        ], $tableOptions);


        $this->createIndex('updated_by', '{{%money_account}}', 'updated_by');
        $this->createIndex('created_by', '{{%money_account}}', 'created_by');
        $this->createIndex('created_at', '{{%money_account}}', 'created_at');
        $this->createIndex('updated_at', '{{%money_account}}', 'updated_at');

        $this->createIndex('user_id', '{{%money_account}}', 'user_id');

        $this->createIndex('amount', '{{%money_account}}', 'amount');
        $this->createIndex('is_active', '{{%money_account}}', 'is_active');
        $this->createIndex('currencyUser', '{{%money_account}}', ['currency_code', 'user_id'], true);

        $this->addCommentOnTable('{{%money_account}}', 'Money accounts');

        $this->addForeignKey(
            'money_account__created_by', "{{%money_account}}",
            'created_by', '{{%cms_user}}', 'id', 'SET NULL', 'SET NULL'
        );

        $this->addForeignKey(
            'money_account__updated_by', "{{%money_account}}",
            'updated_by', '{{%cms_user}}', 'id', 'SET NULL', 'SET NULL'
        );

        $this->addForeignKey(
            'money_account__user_id', "{{%money_account}}",
            'user_id', '{{%cms_user}}', 'id', 'SET NULL', 'SET NULL'
        );

        $this->addForeignKey(
            'money_account__currency_code', "{{%money_account}}",
            'currency_code', '{{%money_currency}}', 'code', 'RESTRICT', 'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey("money_account__updated_by", "{{%money_account}}");
        $this->dropForeignKey("money_account__updated_by", "{{%money_account}}");
        $this->dropForeignKey("money_account__user_id", "{{%money_account}}");
        $this->dropForeignKey("money_account__currency_code", "{{%money_account}}");

        $this->dropTable("{{%money_account}}");
    }
}