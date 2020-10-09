<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ta_register_pengerjaan".
 *
 * @property int $id_register
 * @property int $id_user
 * @property int $waktu_dimulai
 * @property int $waktu_selesai
 *
 * @property User $user
 * @property TaSubBab $taSubBab
 * @property TaRegisterPengerjaanRincian[] $taRegisterPengerjaanRincians
 * @property TaSoal[] $soals
 */
class TaRegisterPengerjaan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ta_register_pengerjaan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'waktu_dimulai', 'waktu_selesai', 'id_sub_bab'], 'required'],
            [['id_user', 'waktu_dimulai', 'waktu_selesai', 'id_sub_bab', 'total_soal', 'total_jawaban_benar'], 'integer'],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
            [['id_sub_bab'], 'exist', 'skipOnError' => true, 'targetClass' => TaSubBab::className(), 'targetAttribute' => ['id_sub_bab' => 'id_sub_bab']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_register' => 'ID Register',
            'id_user' => 'ID User',
            'id_sub_bab' => 'ID Sub Bab',
            'waktu_dimulai' => 'Waktu Dimulai',
            'waktu_selesai' => 'Waktu Selesai',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }

    /**
     * Gets query for [[SubBab]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubBab()
    {
        return $this->hasOne(TaSubBab::className(), ['id_sub_bab' => 'id_sub_bab']);
    }

    /**
     * Gets query for [[TaRegisterPengerjaanRincians]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTaRegisterPengerjaanRincians()
    {
        return $this->hasMany(TaRegisterPengerjaanRincian::className(), ['id_register' => 'id_register']);
    }

    /**
     * Gets Jawaban Benar
     *
     * @return int
     */
    public function getTotalJawabanBenar()
    {
        return $this->hasMany(TaSoal::className(), ['id_soal' => 'id_soal', 'kunci' => 'jawaban'])->viaTable('ta_register_pengerjaan_rincian', ['id_register' => 'id_register'])->count();
    }

    /**
     * Gets Jawaban Salah
     *
     * @return int
     */
    public function getJawabanSalah()
    {
        return $this->hasMany(TaSoal::className(), ['id_soal' => 'id_soal'])->viaTable('ta_register_pengerjaan_rincian', ['id_register' => 'id_register'])->onCondition('kunci <> "jawaban"');
    }

    /**
     * Gets query for [[Soals]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSoals()
    {
        return $this->hasMany(TaSoal::className(), ['id_soal' => 'id_soal'])->viaTable('ta_register_pengerjaan_rincian', ['id_register' => 'id_register']);
    }
}
