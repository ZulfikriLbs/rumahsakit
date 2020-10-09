<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ref_bab".
 *
 * @property int $id_bab
 * @property int $id_kelas
 * @property int $kd_bab
 * @property string $judul
 * @property string $deskripsi
 */
class RefBab extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_bab';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_kelas', 'kd_bab', 'judul'], 'required'],
            [['id_kelas', 'kd_bab'], 'integer'],
            [['judul', 'deskripsi'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_bab' => 'Bab',
            'id_kelas' => 'Kelas',
            'kd_bab' => 'Kode Bab',
            'judul' => 'Judul',
            'deskripsi' => "Deskripsi"
        ];
    }

    /**
     * Gets query for [[Kelas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKelas()
    {
        return $this->hasOne(\common\models\RefKelas::className(), ['id_kelas' => 'id_kelas']);
    }
}
