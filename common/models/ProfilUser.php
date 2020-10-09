<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "profil_user".
 *
 * @property int $id
 * @property string $nama
 * @property string $alamat
 * @property string|null $tempat_lahir
 * @property string|null $tanggal_lahir
 * @property string|null $foto
 */
class ProfilUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $uploadFile;
    public static function tableName()
    {
        return 'profil_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'nama'], 'required'],
            [['id'], 'integer'],
            [['tanggal_lahir'], 'safe'],
            [['nama', 'alamat', 'tempat_lahir', 'foto'], 'string', 'max' => 255],
            [['id'], 'unique'],
            [['uploadFile'], 'file', 'skipOnEmpty' => true,'maxSize' => 3147152],
        ];
    }

    public function upload()
    {
        //$this->hashcode = bin2hex(random_bytes(16));
        //if ($this->isNewRecord)
        //    $this->created_at = time();
        //$this->updated_at = time();
        $this->foto = dirname(dirname(Yii::getAlias('@webroot'))) .'/common/img/user/'. $this->uploadFile->baseName . '.' . $this->uploadFile->extension;

        if ($this->validate()) {
            $this->uploadFile->saveAs(dirname(dirname(Yii::getAlias('@webroot'))) .'/common/img/user/'. $this->uploadFile->baseName . '.' . $this->uploadFile->extension);
            return true;
        } else {
            return false;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'alamat' => 'Alamat',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'foto' => 'Foto',
        ];
    }
}
