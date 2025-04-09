<?php
use yii\db\Migration;

/**
 * Class m230412_123457_create_click_logs_table
 */
class m230412_123457_create_click_logs_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('click_logs', [
            'id' => $this->primaryKey(),
            'link_id' => $this->integer()->notNull(),
            'ip_address' => $this->string()->notNull(),
            'created_at' => $this->integer()->notNull(),
        ]);

        // Добавляем внешний ключ
        $this->addForeignKey(
            'fk-click_logs-link_id',
            'click_logs',
            'link_id',
            'links',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-click_logs-link_id',
            'click_logs',
            'link_id'
        );

        $this->createIndex(
            'idx-click_logs-ip_address',
            'click_logs',
            'ip_address'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk-click_logs-link_id', 'click_logs');
        $this->dropTable('click_logs');
    }
}
