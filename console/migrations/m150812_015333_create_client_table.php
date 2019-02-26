<?php

use yii\db\Schema;
use yii\db\Migration;

class m150812_015333_create_client_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%client}}', [
            'id' => $this->primaryKey(),
            'firstName' => $this->string(255)->notNull(),
            'lastName' => $this->string(255)->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('client');

        return false;
    }
}
