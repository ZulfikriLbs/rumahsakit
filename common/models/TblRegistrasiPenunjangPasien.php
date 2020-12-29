<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_registrasi_penunjang_pasien".
 *
 * @property string $nomor_registrasi_penunjang_pasien
 * @property string $tgl_registrasi_penunjang_pasien
 * @property string $nomor_registrasi_pasien
 * @property int $id_dokter
 * @property int $id_detail_instalasi
 * @property int $no_urut
 * @property string $diagnosa
 * @property int $id
 * @property string $tgl_catat
 * @property string $sample_id
 */
class TblRegistrasiPenunjangPasien extends \yii\db\ActiveRecord
{
    public $dokumen;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_registrasi_penunjang_pasien';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nomor_registrasi_penunjang_pasien', 'tgl_registrasi_penunjang_pasien', 'nomor_registrasi_pasien', 'id_dokter', 'id_detail_instalasi', 'no_urut', 'diagnosa', 'id', 'tgl_catat', 'sample_id'], 'required'],
            [['tgl_registrasi_penunjang_pasien', 'tgl_catat'], 'safe'],
            [['id_dokter', 'id_detail_instalasi', 'no_urut', 'id'], 'integer'],
            [['nomor_registrasi_penunjang_pasien', 'nomor_registrasi_pasien', 'diagnosa', 'sample_id'], 'string', 'max' => 255],
            [['nomor_registrasi_penunjang_pasien'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nomor_registrasi_penunjang_pasien' => 'Nomor Registrasi Penunjang Pasien',
            'tgl_registrasi_penunjang_pasien' => 'Tgl Registrasi Penunjang Pasien',
            'nomor_registrasi_pasien' => 'Nomor Registrasi Pasien',
            'id_dokter' => 'Id Dokter',
            'id_detail_instalasi' => 'Id Detail Instalasi',
            'no_urut' => 'No Urut',
            'diagnosa' => 'Diagnosa',
            'id' => 'ID',
            'tgl_catat' => 'Tgl Catat',
            'sample_id' => 'Sample ID',
        ];
    }
}
