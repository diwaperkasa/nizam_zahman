<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mst_kapal".
 *
 * @property string $id
 * @property string $jenis_izin
 * @property string $kode_kapal
 * @property int $id_master
 * @property string $kode_perusahaan
 * @property string $id_perusahaan
 * @property int $id_alat_tangkap sesuai kepmen
 * @property int $id_alat_tangkap_perizinan sesuai dengan id
 * @property int $id_bahan_kapal
 * @property int $id_jenis_kapal
 * @property int $id_kategori_kapal
 * @property int $id_bendera_kapal
 * @property int $id_negara_asal_kapal
 * @property int $id_bendera_ina bendera kapal indonesia/non indonesia
 * @property string $nama_kapal
 * @property string $tanda_selar
 * @property string $surat_ukur
 * @property string $tempat_gross_akte
 * @property string $nomor_gross_akte
 * @property string $tanggal_gross_akte
 * @property string $nomor_buku_kapal
 * @property string $sertifikat_kelaikan
 * @property string $tempat_pembangunan
 * @property int $tahun_pembangunan
 * @property string $merek_mesin
 * @property string $tipe_mesin
 * @property string $no_mesin
 * @property double $daya_kapal
 * @property int $rpm
 * @property int $jumlah_palkah
 * @property double $kapasitas_palkah
 * @property double $gt_kapal
 * @property double $nt_kapal
 * @property double $panjang_kapal
 * @property double $lebar_kapal
 * @property double $dalam_kapal
 * @property string $hp
 * @property string $p
 * @property string $l
 * @property string $d
 * @property double $loa
 * @property string $spesifikasi_alat_tangkap
 * @property string $nama_kapal_sebelumnya
 * @property string $nama_pemilik_sebelumnya
 * @property string $foto_kapal
 * @property string $nomor_imo
 * @property string $id_transmitter
 * @property string $status_armada
 * @property string $catatan
 * @property int $id_pengguna_buat
 * @property string $tanggal_buat
 * @property int $id_pengguna_ubah
 * @property string $tanggal_ubah
 * @property string $aktif
 */
class MstKapal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mst_kapal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // [['jenis_izin', 'status_armada', 'catatan', 'aktif'], 'string'],
            // [['id_master'], 'required'],
            // [['id_master', 'id_perusahaan', 'id_alat_tangkap', 'id_alat_tangkap_perizinan', 'id_bahan_kapal', 'id_jenis_kapal', 'id_kategori_kapal', 'id_bendera_kapal', 'id_negara_asal_kapal', 'id_bendera_ina', 'tahun_pembangunan', 'rpm', 'id_pengguna_buat', 'id_pengguna_ubah'], 'integer'],
            // [['tanggal_gross_akte', 'tanggal_buat', 'tanggal_ubah'], 'safe'],
            // [['daya_kapal', 'kapasitas_palkah', 'gt_kapal', 'nt_kapal', 'panjang_kapal', 'lebar_kapal', 'dalam_kapal', 'loa'], 'number'],
            // [['kode_kapal', 'kode_perusahaan'], 'string', 'max' => 10],
            // [['nama_kapal', 'nama_kapal_sebelumnya'], 'string', 'max' => 100],
            // [['tanda_selar', 'merek_mesin', 'hp', 'p', 'l', 'd', 'nama_pemilik_sebelumnya'], 'string', 'max' => 50],
            // [['surat_ukur', 'tempat_gross_akte', 'nomor_gross_akte', 'nomor_buku_kapal', 'sertifikat_kelaikan', 'tempat_pembangunan'], 'string', 'max' => 30],
            // [['tipe_mesin', 'no_mesin'], 'string', 'max' => 20],
            // [['jumlah_palkah'], 'string', 'max' => 3],
            // [['spesifikasi_alat_tangkap'], 'string', 'max' => 1000],
            // [['foto_kapal'], 'string', 'max' => 255],
            // [['nomor_imo'], 'string', 'max' => 15],
            // [['id_transmitter'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'jenis_izin' => 'Jenis Izin',
            'kode_kapal' => 'Kode Kapal',
            'id_master' => 'Id Master',
            'kode_perusahaan' => 'Kode Perusahaan',
            'id_perusahaan' => 'Id Perusahaan',
            'id_alat_tangkap' => 'Id Alat Tangkap',
            'id_alat_tangkap_perizinan' => 'Id Alat Tangkap Perizinan',
            'id_bahan_kapal' => 'Id Bahan Kapal',
            'id_jenis_kapal' => 'Id Jenis Kapal',
            'id_kategori_kapal' => 'Id Kategori Kapal',
            'id_bendera_kapal' => 'Id Bendera Kapal',
            'id_negara_asal_kapal' => 'Id Negara Asal Kapal',
            'id_bendera_ina' => 'Id Bendera Ina',
            'nama_kapal' => 'Nama Kapal',
            'tanda_selar' => 'Tanda Selar',
            'surat_ukur' => 'Surat Ukur',
            'tempat_gross_akte' => 'Tempat Gross Akte',
            'nomor_gross_akte' => 'Nomor Gross Akte',
            'tanggal_gross_akte' => 'Tanggal Gross Akte',
            'nomor_buku_kapal' => 'Nomor Buku Kapal',
            'sertifikat_kelaikan' => 'Sertifikat Kelaikan',
            'tempat_pembangunan' => 'Tempat Pembangunan',
            'tahun_pembangunan' => 'Tahun Pembangunan',
            'merek_mesin' => 'Merek Mesin',
            'tipe_mesin' => 'Tipe Mesin',
            'no_mesin' => 'No Mesin',
            'daya_kapal' => 'Daya Kapal',
            'rpm' => 'Rpm',
            'jumlah_palkah' => 'Jumlah Palkah',
            'kapasitas_palkah' => 'Kapasitas Palkah',
            'gt_kapal' => 'Gt Kapal',
            'nt_kapal' => 'Nt Kapal',
            'panjang_kapal' => 'Panjang Kapal',
            'lebar_kapal' => 'Lebar Kapal',
            'dalam_kapal' => 'Dalam Kapal',
            'hp' => 'Hp',
            'p' => 'P',
            'l' => 'L',
            'd' => 'D',
            'loa' => 'Loa',
            'spesifikasi_alat_tangkap' => 'Spesifikasi Alat Tangkap',
            'nama_kapal_sebelumnya' => 'Nama Kapal Sebelumnya',
            'nama_pemilik_sebelumnya' => 'Nama Pemilik Sebelumnya',
            'foto_kapal' => 'Foto Kapal',
            'nomor_imo' => 'Nomor Imo',
            'id_transmitter' => 'Id Transmitter',
            'status_armada' => 'Status Armada',
            'catatan' => 'Catatan',
            'id_pengguna_buat' => 'Id Pengguna Buat',
            'tanggal_buat' => 'Tanggal Buat',
            'id_pengguna_ubah' => 'Id Pengguna Ubah',
            'tanggal_ubah' => 'Tanggal Ubah',
            'aktif' => 'Aktif',
        ];
    }
}
