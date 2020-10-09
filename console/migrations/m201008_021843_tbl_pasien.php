<?php

use yii\db\Migration;

/**
 * Class m201008_021843_tbl_pasien
 */
class m201008_021843_tbl_pasien extends Migration
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
        $this->createTable('tbl_pasien', [
            'no_rekam_medik' => $this->string()->notNull(),
            'nm_pasien' => $this->string()->notNull(),
            'jns_kelamin' => $this->string()->notNull(),
            'alamat' => $this->string()->notNull(),
            'no_ktp' => $this->string()->notNull(),
            'cara_bayar' => $this->string()->notNull(),
            'no_bpjs' => $this->string()->notNull(),
            'no_registrasi' => $this->string()->notNull(),
            'tgl_registrasi' => $this->datetime()->notNull(),
        ], $tableOptions);

        $this->addPrimaryKey('pk_tbl_pasien', 'tbl_pasien', ['no_rekam_medik']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201008_021843_tbl_pasien cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201008_021843_tbl_pasien cannot be reverted.\n";

        return false;
    }
    */
}
