<?php

use yii\db\Migration;

/**
 * Class m201008_025925_tbl_transaksi
 */
class m201008_025925_tbl_transaksi extends Migration
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
        $this->createTable('tbl_transaksi', [
            'id_transaksi' => $this->primaryKey(),
            'tgl_transaksi' => $this->datetime()->notNull(),
            'no_rekam_medik' => $this->string()->notNull(),
            'id_obat' => $this->integer()->notNull(),
            'nm_pasien' => $this->string()->notNull(),
            'cara_bayar' => $this->string()->notNull(),
            'nm_obat' => $this->string()->notNull(),
            'jumlah' => $this->money()->notNull(),
            'harga' => $this->money()->notNull(),
            'total' => $this->money()->notNull(),
            
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201008_025925_tbl_transaksi cannot be reverted.\n";

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201008_025925_tbl_transaksi cannot be reverted.\n";

        return false;
    }
    */
}
