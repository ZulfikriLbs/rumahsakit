<?php

namespace common\models;

use Yii;
use \backend\models\RefBab;

/**
 * This is the model class for table "ta_soal".
 *
 * @property int $id_soal
 * @property int $id_sub_bab
 * @property string $soal
 * @property string $pil_a
 * @property string $pil_b
 * @property string $pil_c
 * @property string $pil_d
 * @property string $kunci
 *
 * @property RefBab $bab
 */
class TaSoal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $uploadFileSoal;
    public static function tableName()
    {
        return 'ta_soal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_sub_bab', 'soal', 'pil_a', 'pil_b', 'pil_c', 'pil_d', 'kunci', 'no_soal'], 'required'],
            [['id_sub_bab', 'no_soal'], 'integer'],
            [['soal', 'pil_a', 'pil_b', 'pil_c', 'pil_d', 'kunci', 'link_soal', 'hashsoal','indikator', 'kompetensi_dasar'], 'string'],
            [['id_sub_bab'], 'exist', 'skipOnError' => true, 'targetClass' => TaSubBab::className(), 'targetAttribute' => ['id_sub_bab' => 'id_sub_bab']],
            [['uploadFileSoal'], 'file', 'skipOnEmpty' => true,'maxSize' => 67108864],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_soal' => 'ID Soal',
            'id_sub_bab' => 'ID Bab',
            'soal' => 'Soal',
            'pil_a' => 'Pil A',
            'pil_b' => 'Pil B',
            'pil_c' => 'Pil C',
            'pil_d' => 'Pil D',
            'kunci' => 'Kunci (Huruf pilihan -huruf kecil-)',
            'no_soal' => 'Nomor',
            'indikator' => 'Indikator',
            'kompetensi_dasar' => 'Kompetensi Dasar'
        ];
    }

    public function upload()
    {
        if ($this->uploadFileSoal) {
            $this->hashsoal = bin2hex(random_bytes(16));
            $this->link_soal = dirname(dirname(Yii::getAlias('@webroot'))) .'/common/img/soal/'. $this->uploadFileSoal->baseName . '.' . $this->uploadFileSoal->extension;
            if ($this->validate()) {
                $this->uploadFileSoal->saveAs(dirname(dirname(Yii::getAlias('@webroot'))) .'/common/img/soal/'. $this->uploadFileSoal->baseName . '.' . $this->uploadFileSoal->extension);
                return true;
            } else {
                return false;
            }
        }
        return false;
    }

    /**
     * Gets query for [[Bab]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBab()
    {
        return $this->hasOne(TaSubBab::className(), ['id_sub_bab' => 'id_sub_bab']);
    }

    /**
     * Gets query for [[Pembahasan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPembahasan()
    {
        return $this->hasOne(TaPembahasan::className(), ['id_soal' => 'id_soal']);
    }

    /**
     * Gets query for [[Register]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRegister()
    {
        return $this->hasOne(TaRegisterPengerjaan::className(), ['id_register' => 'id_register'])->viaTable('ta_register_pengerjaan_rincian', ['id_soal' => 'id_soal']);
    }
}
