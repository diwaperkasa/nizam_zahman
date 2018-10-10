<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;

$this->registerJsFile(
    '@web/js/jasa-kapal-pelabuhan.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
?>

<script type="text/javascript">
    var panjang_kapal = <?= json_encode($model['loa']);?>;
</script>

<div class="col-sm-4 non-printable">
	<br>
	<br>
	<div class="container-fluid">
		<div class="form-group">
			<p><b>Nama Kapal</b></p>
			<p><?= $model['nama_kapal'] ?></p>
		</div>
		<div class="form-group">
			<p><b>Tanda Selar</b></p>
			<p><?= $model['tanda_selar'] ?></p>
		</div>
		<div class="form-group">
			<p><b>Panjang Kapal (m)</b></p>
			<input id="panjang_kapal" type="text" class="form-control" value=<?=$model['loa']?> >
		</div>
		<div class="form-group">
			<p><b>Tanggal Masuk</b></p>
			<p id="tanggal_masuk"><?= $model_kapal_kolam[$id_kapal_kolam]['tanggal_masuk'] ?></p>
		</div>
		<div class="form-group">
			<div class="col-sm-12">
			<?=  $form->field($forms, 'tanggal_keluar')->textInput(['value'=>$date_now, 'onkeyup'=>'dateDiff()']);?>
			</div>	
		</div>		
	</div>
</div>
<div class="col-sm-8 non-printable">
	<div class="container-fluid">
		<h2>Tabel Perhitungan Biaya</h2>
		<p>Tarif PNPB berdasarkan PP no. 75 Tahun 2015</p>
		<p style="display:inline">Lama di Kolam: </p><p style="display:inline" id="lama_tambat"></p><p style="display:inline"> Hari</p>
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th class="col-sm-4">Kegiatan</th>
						<th class="col-sm-2">Hari 1</th>
						<th class="col-sm-2">Hari 2-10</th>
						<th class="col-sm-2">Hari >10</th>
						<th class="col-sm-2">Piutang</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Tambat</td>
						<td class="col-sm-2">
							<div class="container-fluid">
								<?= $form->field($forms, 'tambat_1')->textInput(['value'=>0, 'id'=>'tambat_1', 'type'=>'number'])->label(false);?>
							</div>
						</td>
						<td class="col-sm-2">
							<div class="container-fluid">
								<?= $form->field($forms, 'tambat_2')->textInput(['value'=>0, 'id'=>'tambat_2', 'type'=>'number'])->label(false);?>
							</div>
						</td>
						<td class="col-sm-2">
							<div class="container-fluid">
								<?= $form->field($forms, 'tambat_10')->textInput(['value'=>0, 'id'=>'tambat_10', 'type'=>'number'])->label(false);?>
							</div>
						</td>
						<td class="col-sm-2">
							<div class="container-fluid">
								<?= $form->field($forms, 'hutang_tambat')->textInput(['value'=>0, 'id'=>'hutang_tambat', 'type'=>'number'])->label(false);?>
							</div>
						</td>
					</tr>
					<tr>
						<td>Tender</td>
						<td class="col-sm-2">
							<div class="container-fluid">
								<?= $form->field($forms, 'tender_1')->textInput(['value'=>0, 'id'=>'tender_1', 'type'=>'number'])->label(false);?>
							</div>
						</td>
						<td class="col-sm-2">
							<div class="container-fluid">
								<?= $form->field($forms, 'tender_2')->textInput(['value'=>0, 'id'=>'tender_2', 'type'=>'number'])->label(false);?>
							</div>
						</td>
						<td class="col-sm-2">
							<div class="container-fluid">
								<?= $form->field($forms, 'tender_10')->textInput(['value'=>0, 'id'=>'tender_10', 'type'=>'number'])->label(false);?>
							</div>
						</td>
						<td class="col-sm-2">
							<div class="container-fluid">
								<?= $form->field($forms, 'hutang_tender')->textInput(['value'=>0, 'id'=>'hutang_tender', 'type'=>'number'])->label(false);?>
							</div>
						</td>
					</tr>
						<tr>
							<td>Kebersihan</td>
							<td colspan="3" class="col-sm-8">
								<div class="container-fluid">
									<?= $form->field($forms, 'kebersihan')->textInput(['value'=>0, 'id'=>'kebersihan', 'type'=>'number'])->label(false);?>
								</div>
							</td>
							<td class="col-sm-3">
								<div class="container-fluid">
									<?= $form->field($forms, 'hutang_kebersihan')->textInput(['value' => null, 'id'=>'hutang_kebersihan'])->label(false);?>
								</div>
							</td>
						</tr>
						<tr>
							<td>Info Tambahan</td>
							<td colspan="4" class="col-sm-8">
								<div class="container-fluid">
									<textarea class="form-control" name="FormKapal[comment]" rows="4" cols="50"></textarea>
								</div>
							</td>
						</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="container-fluid">
		<div class="col-sm-6">
			<?php
			include 'modal_pembayaran.php';
			?>
		</div>
	</div>
</div>