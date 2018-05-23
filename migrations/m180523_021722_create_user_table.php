<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m180523_021722_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'license_id' => $this->integer()->notNull(),
            'vehicle_id' => $this->integer()->notNull(),
            'last_name' => $this->string(60)->notNull(),
            'first_name' => $this->string(50)->notNull(),
            'address' => $this->text()->notNull(),
            'phone' => $this->string(12)->notNull(),
            'sex' => $this->string(1)->notNull(),
            'bdate' => $this->date('DATE'),
            'weight' => $this->string(10),
            'height' => $this->string(10),
            'nationality' => $this->string(20),
            'age' => $this->string(99)
        ]);
        $this->createIndex(
            'idx-user-license_id',
            'user','license_id'
        );

        $this->addForeignKey(
            'fk-user-license',
            'user','license_id',
            'license', 'id'
        );

        $this->createIndex(
            'idx-user-vehicle',
            'user','vehicle_id'
        );

        $this->addForeignKey(
            'fk-user-vehicle',
            'user','vehicle_id',
            'vehicle', 'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-user-license', 'user');
        $this->dropForeignKey('fk-user-vehicle', 'user');
        $this->dropIndex('idx-user-license_id','user');
        $this->dropIndex('idx-user-vehicle_id','user');
        $this->dropTable('user');
    }
}
