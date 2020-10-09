<?php

namespace common\models;

use Yii;
use backend\models\RefBab;

/**
 * This is the model class for table "ta_sub_bab".
 *
 * @property int $id_sub_bab
 * @property int $id_bab
 * @property string $kd_bab
 * @property string $judul
 *
 * @property RefBab $bab
 */
class TaSubBab extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ta_sub_bab';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_bab', 'kd_bab', 'judul','deskripsi'], 'required'],
            [['id_bab'], 'integer'],
            [['judul'], 'string'],
            [['deskripsi'], 'string'],
            [['kd_bab'], 'string', 'max' => 255],
            [['id_bab'], 'exist', 'skipOnError' => true, 'targetClass' => RefBab::className(), 'targetAttribute' => ['id_bab' => 'id_bab']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_sub_bab' => 'ID Sub Bab',
            'id_bab' => 'ID Bab',
            'kd_bab' => 'Kode Bab',
            'judul' => 'Judul',
            'deskripsi' => "Deskripsi"
        ];
    }

    /**
     * Gets query for [[Bab]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBab()
    {
        return $this->hasOne(RefBab::className(), ['id_bab' => 'id_bab']);
    }
}
