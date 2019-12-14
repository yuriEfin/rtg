<?php

use yii\db\Migration;

/**
 * Class m191214_023807_createTable__Order
 */
class m191214_023807_createTable__Order extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $prefix = $this->db->tablePrefix;
        $this->createTable(
            '{{%order}}',
            [
                'id' => $this->primaryKey(),
                'room_id' => $this->integer()->notNull()->comment('Order room id'),
                'username' => $this->string()->notNull()->comment('Username'),
                'phone' => $this->integer()->notNull()->comment('Phone'),
                'booked_date' => $this->date()->notNull()->comment('Booked date'),
                'created_at' => $this->timestamp()->notNull()->comment('Created at'),
                'updated_at' => $this->timestamp()->notNull()->comment('Updated at'),
            ]
        );
        $this->addForeignKey('xRoomId', $prefix . 'order', 'room_id', $prefix . 'hotel_room', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%order}}');
    }
}
