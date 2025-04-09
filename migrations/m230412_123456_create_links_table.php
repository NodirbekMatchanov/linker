<?php
use yii\db\Migration;

/**
 * Class m230412_123456_create_links_table
 */
class m230412_123456_create_links_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('links', [
            'id' => $this->primaryKey(),
            'original_url' => $this->string()->notNull(),
            'short_url' => $this->string()->notNull()->unique(),
            'qr_code' => $this->string()->notNull(),
            'clicks' => $this->integer()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
        ]);

        $this->createIndex(
            'idx-links-short_url',
            'links',
            'short_url',
            true // уникальный индекс
        );
    }

    public function safeDown()
    {
        $this->dropTable('links');
    }
}
