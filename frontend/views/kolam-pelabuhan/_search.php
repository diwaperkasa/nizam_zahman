<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SearchMstKapal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mst-kapal-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'nama_kapal') ?>

    <?= $form->field($model, 'gt_kapal') ?>

    <?= $form->field($model, 'tanda_selar') ?>

    <?= $form->field($model, 'kode_perusahaan') ?>

    <?= $form->field($model, 'panjang_kapal') ?>

    <?php // echo $form->field($model, 'id') ?>

    <?php // echo $form->field($model, 'jenis_izin') ?>

    <?php // echo $form->field($model, 'kode_kapal') ?>

    <?php // echo $form->field($model, 'id_master') ?>

    <?php // echo $form->field($model, 'id_perusahaan') ?>

    <?php // echo $form->field($model, 'id_alat_tangkap') ?>

    <?php // echo $form->field($model, 'id_alat_tangkap_perizinan') ?>

    <?php // echo $form->field($model, 'id_bahan_kapal') ?>

    <?php // echo $form->field($model, 'id_jenis_kapal') ?>

    <?php // echo $form->field($model, 'id_kategori_kapal') ?>

    <?php // echo $form->field($model, 'id_bendera_kapal') ?>

    <?php // echo $form->field($model, 'id_negara_asal_kapal') ?>

    <?php // echo $form->field($model, 'id_bendera_ina') ?>

    <?php // echo $form->field($model, 'surat_ukur') ?>

    <?php // echo $form->field($model, 'tempat_gross_akte') ?>

    <?php // echo $form->field($model, 'nomor_gross_akte') ?>

    <?php // echo $form->field($model, 'tanggal_gross_akte') ?>

    <?php // echo $form->field($model, 'nomor_buku_kapal') ?>

    <?php // echo $form->field($model, 'sertifikat_kelaikan') ?>

    <?php // echo $form->field($model, 'tempat_pembangunan') ?>

    <?php // echo $form->field($model, 'tahun_pembangunan') ?>

    <?php // echo $form->field($model, 'merek_mesin') ?>

    <?php // echo $form->field($model, 'tipe_mesin') ?>

    <?php // echo $form->field($model, 'no_mesin') ?>

    <?php // echo $form->field($model, 'daya_kapal') ?>

    <?php // echo $form->field($model, 'rpm') ?>

    <?php // echo $form->field($model, 'jumlah_palkah') ?>

    <?php // echo $form->field($model, 'kapasitas_palkah') ?>

    <?php // echo $form->field($model, 'nt_kapal') ?>

    <?php // echo $form->field($model, 'lebar_kapal') ?>

    <?php // echo $form->field($model, 'dalam_kapal') ?>

    <?php // echo $form->field($model, 'hp') ?>

    <?php // echo $form->field($model, 'p') ?>

    <?php // echo $form->field($model, 'l') ?>

    <?php // echo $form->field($model, 'd') ?>

    <?php // echo $form->field($model, 'loa') ?>

    <?php // echo $form->field($model, 'spesifikasi_alat_tangkap') ?>

    <?php // echo $form->field($model, 'nama_kapal_sebelumnya') ?>

    <?php // echo $form->field($model, 'nama_pemilik_sebelumnya') ?>

    <?php // echo $form->field($model, 'foto_kapal') ?>

    <?php // echo $form->field($model, 'nomor_imo') ?>

    <?php // echo $form->field($model, 'id_transmitter') ?>

    <?php // echo $form->field($model, 'status_armada') ?>

    <?php // echo $form->field($model, 'catatan') ?>

    <?php // echo $form->field($model, 'id_pengguna_buat') ?>

    <?php // echo $form->field($model, 'tanggal_buat') ?>

    <?php // echo $form->field($model, 'id_pengguna_ubah') ?>

    <?php // echo $form->field($model, 'tanggal_ubah') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
