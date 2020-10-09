<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_pasien".
 *
 * @property string $no_rekam_medik
 * @property string $nm_pasien
 * @property string $jns_kelamin
 * @property string $alamat
 * @property string $no_ktp
 * @property string $cara_bayar
 * @property string $no_bpjs
 * @property string $no_registrasi
 * @property string $tgl_registrasi
 */
class TblPasien extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_pasien';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['no_rekam_medik', 'nm_pasien', 'jns_kelamin', 'alamat', 'no_ktp', 'cara_bayar', 'no_bpjs', 'no_registrasi', 'tgl_registrasi'], 'required'],
            [['tgl_registrasi'], 'safe'],
            [['no_rekam_medik', 'nm_pasien', 'jns_kelamin', 'alamat', 'no_ktp', 'cara_bayar', 'no_bpjs', 'no_registrasi'], 'string', 'max' => 255],
            [['no_rekam_medik'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'no_rekam_medik' => 'No Rekam Medik',
            'nm_pasien' => 'Nama Pasien',
            'jns_kelamin' => 'Jenis Kelamin',
            'alamat' => 'Alamat',
            'no_ktp' => 'Nomor KTP',
            'cara_bayar' => 'Cara Bayar',
            'no_bpjs' => 'Nomor BPJS',
            'no_registrasi' => 'Nomor Registrasi',
            'tgl_registrasi' => 'Tanggal Registrasi',
        ];
    }
}
