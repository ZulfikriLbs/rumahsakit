<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ta_pembahasan".
 *
 * @property int $id_pembahasan
 * @property int $id_soal
 * @property string $judul_video
 * @property string $pembahasan
 */
class TaPembahasan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $uploadFileBahas;
    public static function tableName()
    {
        return 'ta_pembahasan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_soal', 'pembahasan'], 'required'],
            [['id_soal'], 'integer'],
            [['judul_video', 'hashbahas', 'judul_video'], 'string'],
            [['uploadFileBahas'], 'file', 'skipOnEmpty' => true,'maxSize' => 67108864],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pembahasan' => 'Pembahasan',
            'id_soal' => 'Soal',
            'judul_video' => 'Judul Video',
            'pembahasan' => 'Isi Pembahasan',
        ];
    }

    public function upload()
    {
        if ($this->uploadFileBahas){
            $this->hashbahas = bin2hex(random_bytes(16));
            $this->judul_video = dirname(dirname(Yii::getAlias('@webroot'))) .'/common/img/pembahasan/'. $this->uploadFileBahas->baseName . '.' . $this->uploadFileBahas->extension;
            if ($this->validate()) {
                $this->uploadFileBahas->saveAs(dirname(dirname(Yii::getAlias('@webroot'))) .'/common/img/pembahasan/'. $this->uploadFileBahas->baseName . '.' . $this->uploadFileBahas->extension);
                return true;
            } else {
                return false;
            }
        }
        return false;
    }
}
