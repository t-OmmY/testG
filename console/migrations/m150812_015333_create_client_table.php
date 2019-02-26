<?php

use yii\db\Schema;
use yii\db\Migration;

class m150812_015333_create_client_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%client}}', [
            'id' => $this->primaryKey(),
            'firstName' => $this->string(255)->notNull(),
            'lastName' => $this->string(255)->notNull(),
        ]);
    }

    public function down()
    {
        $this->dropTable('client');

        return false;
    }
}
