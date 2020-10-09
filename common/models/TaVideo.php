<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "ta_video".
 *
 * @property int $id_video
 * @property int $id_sub_bab
 * @property string $judul
 * @property string $deskripsi
 * @property string|null $hashcode
 * @property string $link
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class TaVideo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $uploadFile;
    public static function tableName()
    {
        return 'ta_video';
    }

    public function upload()
    {
        $this->hashcode = bin2hex(random_bytes(16));
        if ($this->isNewRecord)
            $this->created_at = time();
        $this->updated_at = time();
        $this->link = dirname(dirname(Yii::getAlias('@webroot'))) .'/common/video/pelajaran/'. $this->uploadFile->baseName . '.' . $this->uploadFile->extension;
        if ($this->validate()) {
            $this->uploadFile->saveAs(dirname(dirname(Yii::getAlias('@webroot'))) .'/common/video/pelajaran/'. $this->uploadFile->baseName . '.' . $this->uploadFile->extension);
            return true;
        } else {
            return false;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_sub_bab', 'judul', 'deskripsi', 'link'], 'required'],
            [['id_sub_bab', 'created_at', 'updated_at'], 'integer'],
            [['deskripsi'], 'string'],
            [['judul', 'hashcode', 'link'], 'string', 'max' => 255],
            [['uploadFile'], 'file', 'skipOnEmpty' => false,'maxSize' => 67108864],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_video' => 'Video',
            'id_sub_bab' => 'Bab',
            'judul' => 'Judul',
            'deskripsi' => 'Deskripsi',
            'hashcode' => 'Hashcode',
            'link' => 'Link',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
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
}
