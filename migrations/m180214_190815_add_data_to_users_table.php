<?php

use yii\db\Migration;

/**
 * Class m180214_190815_add_data_to_users_table
 */
class m180214_190815_add_data_to_users_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {

        $this->insert('users', [
           'firstName' => 'Serik',
            'lastName' => 'Shaikamalov',
            'isActive' => 1
        ]);

        $this->insert('users', [
            'firstName' => 'Berik',
            'lastName' => 'Shaikamalov',
            'isActive' => 1
        ]);


        $this->insert('users', [
            'firstName' => 'Arailym',
            'lastName' => 'Shaikamalova',
            'isActive' => 1
        ]);

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180214_190815_add_data_to_users_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180214_190815_add_data_to_users_table cannot be reverted.\n";

        return false;
    }
    */
}
