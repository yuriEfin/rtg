<?php

use yii\db\Migration;

/**
 * Class m191214_000405_createTable__hotel_booked_room
 */
class m191214_000405_createTable__hotel_booked_room extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $prf = $this->db->tablePrefix;
        $this->createTable(
            '{{%hotel_booked_room}}',
            [
                'id' => $this->primaryKey(),
                'room_id' => $this->integer()->notNull()->comment('Room ID'),
                'username' => $this->string()->notNull()->comment('Username'),
                'phone' => $this->integer()->notNull()->comment('Phone'),
                'booked_date' => $this->date()->notNull()->comment('Booked date'),
                'created_at' => $this->timestamp()->notNull()->comment('Created at'),
                'updated_at' => $this->timestamp()->notNull()->comment('Updated at'),
            ]
        );
        $this->addForeignKey('xhotel_room', $prf . 'hotel_booked_room', 'room_id', $prf . 'hotel_room', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('xhotel_room', '{{%hotel_booked_room}}');
        $this->dropTable('{{%hotel_booked_room}}');
    }
}
