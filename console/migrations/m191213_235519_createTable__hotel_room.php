<?php

use yii\db\Migration;

/**
 * Class m191213_235519_createTable__hotel_room
 */
class m191213_235519_createTable__hotel_room extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%hotel_room}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->comment('Name'),
            'description' => $this->string()->notNull()->comment('Description'),
            'created_at' => $this->string()->notNull()->comment('Created at'),
            'updated_at' => $this->string()->notNull()->comment('Updated at'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%hotel_room}}');
    }
}
