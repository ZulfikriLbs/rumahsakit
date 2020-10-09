<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ref_kelas".
 *
 * @property int $id_kelas
 * @property string $nm_kelas
 *
 * @property RefBab[] $refBabs
 */
class RefKelas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_kelas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nm_kelas'], 'required'],
            [['nm_kelas'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_kelas' => 'Kelas',
            'nm_kelas' => 'Nama Kelas',
        ];
    }

    /**
     * Gets query for [[RefBabs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRefBabs()
    {
        return $this->hasMany(RefBab::className(), ['id_kelas' => 'id_kelas']);
    }
}
