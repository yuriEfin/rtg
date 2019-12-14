<?php

use yii\db\Migration;

/**
 * Class m191214_023758_createTable__Hotel_room
 */
class m191214_023758_createTable__Hotel_room extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $prf = $this->db->tablePrefix;
        $this->createTable(
            '{{%hotel_room}}',
            [
                'id' => $this->primaryKey(),
                'hotel_id' => $this->integer()->notNull()->comment('Hotel ID'),
                'number' => $this->string()->notNull()->comment('Number'),
                'created_at' => $this->timestamp()->notNull()->comment('Created at'),
                'updated_at' => $this->timestamp()->notNull()->comment('Updated at'),
            ]
        );
        $this->addForeignKey('xhotel', $prf . 'hotel_room', 'hotel_id', $prf . 'hotel', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('xhotel', '{{%hotel_room}}');
        $this->dropTable('{{%hotel_room}}');
    }
}
