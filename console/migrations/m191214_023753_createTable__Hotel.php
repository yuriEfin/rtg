<?php

use yii\db\Migration;

/**
 * Class m191214_023753_createTable__Hotel
 */
class m191214_023753_createTable__Hotel extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(
            '{{%hotel}}',
            [
                'id' => $this->primaryKey(),
                'title' => $this->string()->notNull()->comment('Title hotel'),
                'created_at' => $this->timestamp(),
                'updated_at' => $this->timestamp(),
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%hotel}}');
    }
}
