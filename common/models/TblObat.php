<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_obat".
 *
 * @property int $id_obat
 * @property string $nm_obat
 * @property string $merk
 * @property string $nm_pabrikan
 * @property string $satuan
 * @property float|null $harga
 */
class TblObat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_obat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nm_obat', 'merk', 'nm_pabrikan', 'satuan'], 'required'],
            [['harga'], 'number'],
            [['nm_obat', 'merk', 'nm_pabrikan', 'satuan'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_obat' => 'Id Obat',
            'nm_obat' => 'Nama Obat',
            'merk' => 'Merk',
            'nm_pabrikan' => 'Nama Pabrikan',
            'satuan' => 'Satuan',
            'harga' => 'Harga',
        ];
    }
}
