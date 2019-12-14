<?php

use yii\db\Migration;

/**
 * Class m191214_131308_alter_table__hotel_room
 */
class m191214_131308_alter_table__hotel_room extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $pref = $this->db->tablePrefix;
        $this->dropColumn('{{%order}}', 'booked_date');
        $this->addColumn('{{%order}}', 'booked_date_from', $this->date()->notNull()->comment('Booked date from'));
        $this->addColumn('{{%order}}', 'booked_date_to', $this->date()->notNull()->comment('Booked date to'));
        $this->addColumn('{{%order}}', 'hotel_id', $this->integer()->notNull()->comment('Hotel id'));
        $this->alterColumn('{{%order}}', 'phone', $this->string()->notNull()->comment('Phone'));
        $this->addForeignKey('xHotelId', $pref . 'order', 'hotel_id', $pref . 'hotel', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
//        $pref = $this->db->tablePrefix;
//        $this->dropForeignKey('xHotelId', $pref.'order');
        $this->dropColumn('{{%order}}', 'booked_date_from');
        $this->dropColumn('{{%order}}', 'booked_date_to');
        $this->dropColumn('{{%order}}', 'hotel_id');
        $this->addColumn('{{%order}}', 'booked_date', $this->date()->notNull()->comment('Booked date from'));
    }
}
