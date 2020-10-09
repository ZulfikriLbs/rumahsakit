<?php

use yii\db\Migration;

/**
 * Class m200120_114050_tambah_user_admin
 */
class m200120_114050_tambah_user_admin extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $currentEnvironment = getenv('YII_ENV');
        if($currentEnvironment == 'prod')
            $pass = '$2y$13$5DRvZ6TUmY0Kz4gtK4KXC.LXKXf3xQH5TcfmYcIjfnTnKUTtkT7Ju';
        else
            $pass = '$2y$13$4bebLcWNjUKLZGAfPJyWRua2E0g3ZYq0Y7O421M0voAo7sygbcNWu';
        $this->batchInsert(
            'user',
            [   
                'username',
                'auth_key',
                'password_hash',
                'password_reset_token',
                'email',
                'status',
                'created_at',
                'updated_at'
            ], 
            [
                ['admin', '1qM0pLpvgVd4uO64x87XtHNNrUZ-f3g6', $pass, '','admin@gmail.com','10','1551156735','1551156735']
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200120_114050_tambah_user_admin cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200120_114050_tambah_user_admin cannot be reverted.\n";

        return false;
    }
    */
}
