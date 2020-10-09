<?php

use yii\db\Migration;

/**
 * Class m201008_023606_buat_sa
 */
class m201008_023606_buat_sa extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
		if ($this->db->driverName === 'mysql') {
			// http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
			$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
		}

		$this->createTable('{{%route}}', [
			'name' => $this->string(64),
			'alias' => $this->string(64)->notNull(),
			'type' => $this->string(64)->notNull(),
			'status' => $this->smallInteger()->notNull()->defaultValue(1),
			'PRIMARY KEY(name)',
        ], $tableOptions);
        
        $this->batchInsert(
            'auth_item',
            [   
                'name',
                'type',
                'description',
                'rule_name',
                'data',
                'created_at',
                'updated_at'
            ], 
            [
                ['Administrator Aplikasi', '1', null, null,null,'1551156735','1551156735'],
                ['/*', '2', null, null,null,'1551156735','1551156735']
            ]
        );

        $this->batchInsert(
            'auth_item_child',
            [   
                'parent',
                'child'
            ], 
            [
                ['Administrator Aplikasi', '/*']
            ]
        );

        $this->batchInsert(
            'auth_assignment',
            [   
                'item_name',
                'user_id',
                'created_at',
            ], 
            [
                ['Administrator Aplikasi', '1','1551156735']
            ]
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201008_023606_buat_sa cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201008_023606_buat_sa cannot be reverted.\n";

        return false;
    }
    */
}
