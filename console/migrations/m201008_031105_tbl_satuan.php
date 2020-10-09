<?php

use yii\db\Migration;

/**
 * Class m201008_031105_tbl_satuan
 */
class m201008_031105_tbl_satuan extends Migration
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
        $this->createTable('tbl_satuan', [
            'id_satuan' => $this->primaryKey(),
            'nm_satuan' => $this->string()->notNull(),    
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201008_031105_tbl_satuan cannot be reverted.\n";

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201008_031105_tbl_satuan cannot be reverted.\n";

        return false;
    }
    */
}
