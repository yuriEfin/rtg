<?php

use yii\db\Migration;

/**
 * Class m191214_125943_addColumn__short_description__to_Hotel
 */
class m191214_125943_addColumn__short_description__to_Hotel extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%hotel}}', 'short_description',  $this->string()->notNull()->comment('Short desciption'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%hotel}}', 'short_description');
    }
}
