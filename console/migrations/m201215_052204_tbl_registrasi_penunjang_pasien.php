<?php

use yii\db\Migration;

/**
 * Class m201215_052204_tbl_registrasi_pasien
 */
class m201215_052204_tbl_registrasi_penunjang_pasien extends Migration
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
        $this->createTable('tbl_registrasi_penunjang_pasien', [
            'nomor_registrasi_penunjang_pasien' => $this->string()->notNull(),
            'tgl_registrasi_penunjang_pasien' => $this->datetime()->notNull(),
            'nomor_registrasi_pasien' => $this->string()->notNull(), 
            'id_dokter' => $this->integer()->notNull(),
            'id_detail_instalasi' => $this->integer()->notNull(),
            'no_urut' => $this->integer()->notNull(),
            'diagnosa' => $this->string()->notNull(),
            'id' => $this->integer()->notNull(),
            'tgl_catat' => $this->datetime()->notNull(),
            'sample_id' => $this->string()->notNull(),   
        ], $tableOptions);

        $this->addPrimaryKey('pk_tbl_registrasi_penunjang_pasien', 'tbl_registrasi_penunjang_pasien', ['nomor_registrasi_penunjang_pasien']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201215_052204_tbl_registrasi_pasien cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201215_052204_tbl_registrasi_pasien cannot be reverted.\n";

        return false;
    }
    */
}
