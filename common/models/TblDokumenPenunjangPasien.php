<?php

namespace common\models;

use Yii;
use kartik\builder\TabularForm;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "tbl_dokumen_penunjang_pasien".
 *
 * @property string $accession_number
 * @property string $nomor_registrasi_penunjang_pasien
 * @property string $tgl_dokumen_penunjang_pasien
 * @property string $tindakan
 * @property int|null $jumlah
 * @property string|null $sedasi
 * @property int|null $nomor_foto
 * @property int|null $selesai
 * @property int|null $batal
 * @property string|null $alasan_batal
 * @property int|null $cito
 * @property int|null $pkt
 */
class TblDokumenPenunjangPasien extends \yii\db\ActiveRecord
{
    public $dokumen;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_dokumen_penunjang_pasien';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['accession_number', 'nomor_registrasi_penunjang_pasien', 'tgl_dokumen_penunjang_pasien', 'tindakan', 'id_dicom'], 'required'],
            [['tgl_dokumen_penunjang_pasien'], 'safe'],
            [['jumlah', 'nomor_foto', 'selesai', 'batal', 'cito', 'pkt'], 'integer'],
            [['accession_number', 'nomor_registrasi_penunjang_pasien', 'tindakan', 'sedasi', 'alasan_batal', 'id_dicom'], 'string', 'max' => 255],
            [['accession_number'], 'unique'],
            [['dokumen'], 'file', 'skipOnEmpty' => false, 'extensions' => 'dcm, dicm'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'accession_number' => 'Accession Number',
            'nomor_registrasi_penunjang_pasien' => 'Nomor Registrasi Penunjang Pasien',
            'tgl_dokumen_penunjang_pasien' => 'Tgl Dokumen Penunjang Pasien',
            'tindakan' => 'Tindakan',
            'jumlah' => 'Jumlah',
            'sedasi' => 'Sedasi',
            'nomor_foto' => 'Nomor Foto',
            'selesai' => 'Selesai',
            'batal' => 'Batal',
            'alasan_batal' => 'Alasan Batal',
            'cito' => 'Cito',
            'pkt' => 'Pkt',
        ];
    }

    public function getFormAttribs() {
        return [
            // primary key column
            'accession_number'=>[ // primary key attribute
                'type'=>TabularForm::INPUT_HIDDEN, 
                'columnOptions'=>['hidden'=>true]
            ], 
            'cito' => [
                'type' => TabularForm::INPUT_CHECKBOX,
            ],
            'pkt' => [
                'type' => TabularForm::INPUT_CHECKBOX,
            ],
            'tindakan' => [
                'type' => TabularForm::INPUT_TEXT,
            ],
            'tgl_dokumen_penunjang_pasien' => [
                'type' => TabularForm::INPUT_TEXT,
            ],
            'jumlah' => [
                'type' => TabularForm::INPUT_TEXT,
            ],
            'dokumen' => [
                'type' => TabularForm::INPUT_FILE,
            ],
            'nomor_foto' => [
                'type' => TabularForm::INPUT_TEXT,
            ],
            'selesai' => [
                'type' => TabularForm::INPUT_CHECKBOX,
            ],
            'batal' => [
                'type' => TabularForm::INPUT_CHECKBOX,
            ],
            'alasan_batal' => [
                'type' => TabularForm::INPUT_TEXT,
            ],
            
        ];
    }
}
