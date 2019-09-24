<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m190924_091329_workers
 */
class m190924_091329_workers extends Migration
{

    public function safeUp()
    {
        $this->createTable('workers', [
            'id' => Schema::TYPE_PK,
            'position_id' => Schema::TYPE_INTEGER,
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'soname' => Schema::TYPE_STRING . ' NOT NULL',
            'characteristic' => Schema::TYPE_TEXT,
            'salary'=>$this->decimal(6,2)
        ]);
        $this->addForeignKey('fk_position_id','workers','position_id','positions','id','restrict','No action');

    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_position_id','workers');
        $this->dropTable('workers');
    }
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('workers', [
            'id' => Schema::TYPE_PK,
            'position_id' => Schema::TYPE_INTEGER,
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'soname' => Schema::TYPE_STRING . ' NOT NULL',
            'characteristic' => Schema::TYPE_TEXT,
            'salary'=>$this->decimal(10,2)
        ]);
        $this->addForeignKey('fk_position_id','workers','position_id','positions','id','restrict','No action');

    }

    public function down()
    {
        $this->dropForeignKey('fk_position_id','workers');
        $this->dropTable('workers');
    }
}
