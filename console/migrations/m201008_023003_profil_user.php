<?php

use yii\db\Migration;

/**
 * Class m201008_023003_profil_user
 */
class m201008_023003_profil_user extends Migration
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

        $this->createTable('{{%profil_user}}', [
            'id' => $this->integer()->notNull(),
            'nama' => $this->string()->notNull(),
            'alamat' => $this->string(),
            'tempat_lahir' => $this->string(),
            'tanggal_lahir' => $this->dateTime(),
            'foto' => $this->string(),
        ], $tableOptions);

        $this->addPrimaryKey('pk_profil_user', 'profil_user', ['id']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201008_023003_profil_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201008_023003_profil_user cannot be reverted.\n";

        return false;
    }
    */
}
