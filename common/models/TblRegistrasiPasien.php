<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_registrasi_pasien".
 *
 * @property string $nomor_registrasi_pasien
 * @property string $tgl_registrasi_pasien
 * @property int $id_dokter
 * @property int $id_detail_instalasi
 * @property int|null $id_ruang_rawat
 * @property int $no_urut
 * @property int|null $kunjungan_ke
 * @property string $diagnosa
 * @property int $id
 * @property string $tgl_catat
 * @property string|null $tgl_ubah
 * @property string|null $alasan_ubah
 * @property string|null $keterangan_ubah
 */
class TblRegistrasiPasien extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_registrasi_pasien';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nomor_registrasi_pasien', 'tgl_registrasi_pasien', 'id_dokter', 'id_detail_instalasi', 'no_urut', 'diagnosa', 'id', 'tgl_catat', 'nomor_rekam_medik'], 'required'],
            [['tgl_registrasi_pasien', 'tgl_catat', 'tgl_ubah'], 'safe'],
            [['id_dokter', 'id_detail_instalasi', 'id_ruang_rawat', 'no_urut', 'kunjungan_ke', 'id'], 'integer'],
            [['nomor_registrasi_pasien', 'diagnosa', 'alasan_ubah', 'keterangan_ubah', 'nomor_rekam_medik'], 'string', 'max' => 255],
            [['nomor_registrasi_pasien'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nomor_registrasi_pasien' => 'Nomor Registrasi Pasien',
            'tgl_registrasi_pasien' => 'Tgl Registrasi Pasien',
            'id_dokter' => 'Id Dokter',
            'id_detail_instalasi' => 'Id Detail Instalasi',
            'id_ruang_rawat' => 'Id Ruang Rawat',
            'no_urut' => 'No Urut',
            'kunjungan_ke' => 'Kunjungan Ke',
            'diagnosa' => 'Diagnosa',
            'id' => 'ID',
            'tgl_catat' => 'Tgl Catat',
            'tgl_ubah' => 'Tgl Ubah',
            'alasan_ubah' => 'Alasan Ubah',
            'keterangan_ubah' => 'Keterangan Ubah',
            'nomor_rekam_medik' => 'Nomor RM'
        ];
    }
}
