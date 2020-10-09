<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ta_register_pengerjaan_rincian".
 *
 * @property int $id_register
 * @property int $id_soal
 * @property string $jawaban
 *
 * @property TaSoal $soal
 * @property TaRegisterPengerjaan $register
 */
class TaRegisterPengerjaanRincian extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ta_register_pengerjaan_rincian';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_register', 'id_soal', 'jawaban'], 'required'],
            [['id_register', 'id_soal'], 'integer'],
            [['jawaban'], 'string'],
            [['id_register', 'id_soal'], 'unique', 'targetAttribute' => ['id_register', 'id_soal']],
            [['id_soal'], 'exist', 'skipOnError' => true, 'targetClass' => TaSoal::className(), 'targetAttribute' => ['id_soal' => 'id_soal']],
            [['id_register'], 'exist', 'skipOnError' => true, 'targetClass' => TaRegisterPengerjaan::className(), 'targetAttribute' => ['id_register' => 'id_register']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_register' => 'ID Register',
            'id_soal' => 'ID Soal',
            'jawaban' => 'Jawaban',
        ];
    }

    /**
     * Gets query for [[Soal]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSoal()
    {
        return $this->hasOne(TaSoal::className(), ['id_soal' => 'id_soal']);
    }

    /**
     * Gets query for [[Register]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRegister()
    {
        return $this->hasOne(TaRegisterPengerjaan::className(), ['id_register' => 'id_register']);
    }
}
