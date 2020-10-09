<?php

use yii\db\Migration;

/**
 * Class m201008_025729_tbl_obat
 */
class m201008_025729_tbl_obat extends Migration
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
        $this->createTable('tbl_obat', [
            'id_obat' => $this->primaryKey(),
            'nm_obat' => $this->string()->notNull(),
            'merk' => $this->string()->notNull(),
            'nm_pabrikan' => $this->string()->notNull(),
            'satuan' => $this->string()->notNull(),
            'harga' => $this->money(),
        ], $tableOptions);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201008_025729_tbl_obat cannot be reverted.\n";

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201008_025729_tbl_obat cannot be reverted.\n";

        return false;
    }
    */
}
