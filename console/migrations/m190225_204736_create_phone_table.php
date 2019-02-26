<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%phone}}`.
 */
class m190225_204736_create_phone_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%phone}}', [
            'id' => $this->primaryKey(),
            'value' => $this->string(50)->notNull(),
            'client_id' => $this->integer()->notNull()
        ], $tableOptions);

        $this->createIndex(
            'idx-phone-client_id',
            'phone',
            'client_id'
        );

        $this->addForeignKey(
            'fk-phone-client_id',
            'phone',
            'client_id',
            'client',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-phone-client_id',
            'client'
        );

        $this->dropIndex(
            'idx-phone-client_id',
            'client'
        );

        $this->dropTable('{{%phone}}');
    }
}
