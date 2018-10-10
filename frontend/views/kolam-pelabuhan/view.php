<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MstKapal */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pengusahaan Pelayanan Pelabuhan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mst-kapal-view">
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <div class="col-sm-6">
        <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nama_kapal',
            'gt_kapal',
            'tanda_selar',
            'kode_perusahaan',
            'panjang_kapal',
            'id',
            'jenis_izin',
            'kode_kapal',
            'id_master',
            'id_perusahaan',
            'id_alat_tangkap',
            'id_alat_tangkap_perizinan',
            'id_bahan_kapal',
            'id_jenis_kapal',
            'id_kategori_kapal',
            'id_bendera_kapal',
            'id_negara_asal_kapal',
            'id_bendera_ina',
            'surat_ukur',
            'tempat_gross_akte',
            'nomor_gross_akte',
            'tanggal_gross_akte',
            'nomor_buku_kapal',
            'sertifikat_kelaikan',
            'tempat_pembangunan',
            'tahun_pembangunan',
            'merek_mesin',
        ],
    ]) ?>    
    </div>
    <div class="col-sm-6">
        <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'merek_mesin',
            'tipe_mesin',
            'no_mesin',
            'daya_kapal',
            'rpm',
            'jumlah_palkah',
            'kapasitas_palkah',
            'nt_kapal',
            'lebar_kapal',
            'dalam_kapal',
            'hp',
            'p',
            'l',
            'd',
            'loa',
            'spesifikasi_alat_tangkap',
            'nama_kapal_sebelumnya',
            'nama_pemilik_sebelumnya',
            'foto_kapal',
            'nomor_imo',
            'id_transmitter',
            'status_armada',
            'catatan:ntext',
            'id_pengguna_buat',
            'tanggal_buat',
            'id_pengguna_ubah',
            'tanggal_ubah',
        ],
    ]) ?>    
    </div>
    
</div>
