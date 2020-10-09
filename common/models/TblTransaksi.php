<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_transaksi".
 *
 * @property int $id_transaksi
 * @property string $tgl_transaksi
 * @property string $no_rekam_medik
 * @property int $id_obat
 * @property string $nm_pasien
 * @property string $cara_bayar
 * @property string $nm_obat
 * @property string $jumlah
 * @property float $harga
 * @property float $total
 */
class TblTransaksi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_transaksi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tgl_transaksi', 'no_rekam_medik', 'id_obat', 'nm_pasien', 'cara_bayar', 'nm_obat', 'jumlah', 'harga', 'total'], 'required'],
            [['tgl_transaksi',], 'safe'],
            [['id_obat','jumlah'], 'integer'],
            [['harga', 'total'], 'number'],
            [['no_rekam_medik', 'nm_pasien', 'cara_bayar', 'nm_obat'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_transaksi' => 'Id Transaksi',
            'tgl_transaksi' => 'Tanggal Transaksi',
            'no_rekam_medik' => 'Nomor Rekam Medik',
            'id_obat' => 'Id Obat',
            'nm_pasien' => 'Nama Pasien',
            'cara_bayar' => 'Cara Bayar',
            'nm_obat' => 'Nama Obat',
            'jumlah' => 'Jumlah',
            'harga' => 'Harga',
            'total' => 'Total',
        ];
    }
}
