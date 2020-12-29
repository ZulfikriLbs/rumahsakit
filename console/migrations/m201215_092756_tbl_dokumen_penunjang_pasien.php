<?php

use yii\db\Migration;

/**
 * Class m201215_092756_tbl_dokumen_penunjang_pasien
 */
class m201215_092756_tbl_dokumen_penunjang_pasien extends Migration
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
        $this->createTable('tbl_dokumen_penunjang_pasien', [
            'accession_number' => $this->string()->notNull(),
            'nomor_registrasi_penunjang_pasien' => $this->string()->notNull(),
            'tgl_dokumen_penunjang_pasien' => $this->datetime()->notNull(),
            'tindakan' => $this->string()->notNull(), 
            'jumlah' => $this->integer(),
            'sedasi' => $this->string(),
            'nomor_foto' => $this->integer(),
            'selesai' => $this->tinyInteger(),
            'batal' => $this->tinyInteger(),
            'alasan_batal' => $this->string(),
            'cito' => $this->tinyInteger(), 
            'pkt' => $this->tinyInteger(), 
            'id_dicom' => $this->string()->notNull(),
        ], $tableOptions);

        $this->addPrimaryKey('pk_tbl_dokumen_penunjang_pasien', 'tbl_dokumen_penunjang_pasien', ['accession_number']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201215_092756_tbl_dokumen_penunjang_pasien cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201215_092756_tbl_dokumen_penunjang_pasien cannot be reverted.\n";

        return false;
    }
    */
}
