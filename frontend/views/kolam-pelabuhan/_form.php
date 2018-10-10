<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MstKapal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mst-kapal-form">

    <?php $form = ActiveForm::begin(); ?>
	
	<div class="col-sm-6">
		<?= $form->field($model, 'nama_kapal')->textInput() ?>
		<?= $form->field($model, 'gt_kapal')->textInput() ?>
		<?= $form->field($model, 'tanda_selar')->textInput(['maxlength' => true]) ?>
		<?= $form->field($model, 'kode_perusahaan')->textInput(['maxlength' => true]) ?>
		<?= $form->field($model, 'panjang_kapal')->textInput() ?>
		<?= $form->field($model, 'jenis_izin')->textInput(['maxlength' => true]) ?>
		<?= $form->field($model, 'kode_kapal')->textInput(['maxlength' => true]) ?>
		<?= $form->field($model, 'id_master')->textInput() ?>
		<?= $form->field($model, 'id_perusahaan')->textInput(['maxlength' => true]) ?>
		<?= $form->field($model, 'id_alat_tangkap')->textInput() ?>
		<?= $form->field($model, 'id_alat_tangkap_perizinan')->textInput() ?>
		<?= $form->field($model, 'id_bahan_kapal')->textInput() ?>
		<?= $form->field($model, 'id_jenis_kapal')->textInput() ?>
		<?= $form->field($model, 'id_kategori_kapal')->textInput() ?>
		<?= $form->field($model, 'id_bendera_kapal')->textInput() ?>
		<?= $form->field($model, 'id_negara_asal_kapal')->textInput() ?>
		<?= $form->field($model, 'id_bendera_ina')->textInput() ?>
		<?= $form->field($model, 'surat_ukur')->textInput(['maxlength' => true]) ?>
		<?= $form->field($model, 'tempat_gross_akte')->textInput(['maxlength' => true]) ?>
		<?= $form->field($model, 'nomor_gross_akte')->textInput(['maxlength' => true]) ?>
		<?= $form->field($model, 'tanggal_gross_akte')->textInput() ?>
		<?= $form->field($model, 'nomor_buku_kapal')->textInput(['maxlength' => true]) ?>
		<?= $form->field($model, 'sertifikat_kelaikan')->textInput(['maxlength' => true]) ?>
		<?= $form->field($model, 'tempat_pembangunan')->textInput(['maxlength' => true]) ?>
		<?= $form->field($model, 'tahun_pembangunan')->textInput() ?>
		<?= $form->field($model, 'merek_mesin')->textInput(['maxlength' => true]) ?>
		<?= $form->field($model, 'tipe_mesin')->textInput(['maxlength' => true]) ?>
	</div>
	
	<div class="col-sm-6">
		<?= $form->field($model, 'no_mesin')->textInput(['maxlength' => true]) ?>
		<?= $form->field($model, 'daya_kapal')->textInput() ?>
		<?= $form->field($model, 'rpm')->textInput() ?>
		<?= $form->field($model, 'jumlah_palkah')->textInput() ?>
		<?= $form->field($model, 'kapasitas_palkah')->textInput() ?>
		<?= $form->field($model, 'nt_kapal')->textInput() ?>
		<?= $form->field($model, 'lebar_kapal')->textInput() ?>
		<?= $form->field($model, 'dalam_kapal')->textInput() ?>
		<?= $form->field($model, 'hp')->textInput(['maxlength' => true]) ?>
		<?= $form->field($model, 'p')->textInput(['maxlength' => true]) ?>
		<?= $form->field($model, 'l')->textInput(['maxlength' => true]) ?>
		<?= $form->field($model, 'd')->textInput(['maxlength' => true]) ?>
		<?= $form->field($model, 'loa')->textInput() ?>
		<?= $form->field($model, 'spesifikasi_alat_tangkap')->textInput(['maxlength' => true]) ?>
		<?= $form->field($model, 'nama_kapal_sebelumnya')->textInput(['maxlength' => true]) ?>
		<?= $form->field($model, 'nama_pemilik_sebelumnya')->textInput(['maxlength' => true]) ?>
		<?= $form->field($model, 'foto_kapal')->textInput(['maxlength' => true]) ?>
		<?= $form->field($model, 'nomor_imo')->textInput(['maxlength' => true]) ?>
		<?= $form->field($model, 'id_transmitter')->textInput(['maxlength' => true]) ?>
		<?= $form->field($model, 'status_armada')->textInput(['maxlength' => true]) ?>
		<?= $form->field($model, 'catatan')->textarea(['rows' => 6]) ?>
		<?= $form->field($model, 'id_pengguna_buat')->textInput() ?>
		<?= $form->field($model, 'tanggal_buat')->textInput() ?>
		<?= $form->field($model, 'id_pengguna_ubah')->textInput() ?>
		<?= $form->field($model, 'tanggal_ubah')->textInput() ?>
		
		<div class="form-group">
			<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
		</div>
	</div>


    <?php ActiveForm::end(); ?>

</div>
