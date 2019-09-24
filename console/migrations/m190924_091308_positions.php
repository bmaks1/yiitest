<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m190924_091308_positions
 */
class m190924_091308_positions extends Migration
{

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('positions', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'description' => Schema::TYPE_TEXT,
        ]);
    }

    public function down()
    {
        $this->dropTable('positions');
    }

}
