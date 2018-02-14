<?php

use yii\db\Migration;

/**
 * Handles the creation of table `staff`.
 */
class m180214_183133_create_staff_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('staffs', [
            'Id' => $this->primaryKey(),
            'Title' => $this->string(),
            'IsActive' => $this->boolean()
        ]);


        $this->insert('staffs', [
            'Title' => 'First Title',
            'IsActive' => 1
        ]);

    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('staff');
    }
}
