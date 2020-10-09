<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_satuan".
 *
 * @property int $id_satuan
 * @property string $nm_satuan
 */
class TblSatuan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_satuan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nm_satuan'], 'required'],
            [['nm_satuan'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_satuan' => 'Id Satuan',
            'nm_satuan' => 'Nm Satuan',
        ];
    }
}
