<?php

use yii\db\Migration;

class m250410_110431_add_expires_at_to_links extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('links', 'scans', $this->integer()->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('links', 'scans');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250410_110430_add_expires_at_to_links cannot be reverted.\n";

        return false;
    }
    */
}
