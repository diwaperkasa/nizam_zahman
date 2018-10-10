<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;
use yii\bootstrap\Modal;

Modal::begin([
	'header' => '<h3 class="text-center">Nota Pembayaran</h3>',
	'footer' => 'No Rek Perindo: (BNI) 1605-2012-06 a/n Perikanan Indonesia',
	'toggleButton' => ['id' => 'hitung_button', 'label' => 'Hitung Pembayaran', 'class' => "btn btn-primary", 'style' => 'margin-bottom:25px'],
]);
?>

<div class="container-fluid" id="print_area">
	<div class="row">
		  <div class="row">
			 <div class="col-xs-6 col-sm-6 col-md-6">
				<address>
				   <strong>Pelabuhan Perikanan Samudera</strong>
				   <strong>Nizam Zachman Jakarta</strong>
				   <br>
				   Jalan Muara Baru Ujung Jakarta Utara 14440
				   <br>
				   Laman: www.ppsnzj.info Pos Elektronik: ppsnzj@gmail.com
				   <br>
				   <abbr title="Telepon">P:</abbr> (021) 6617865
				</address>
			 </div>
			 <div class="col-xs-6 col-sm-6 col-md-6 text-right">
				<p>
				   <em>Date: <?= $date_now ?></em>
				</p>
				<p>
				   <em>Receipt #: <?=$model_kapal_kolam[$id_kapal_kolam]['id']?></em>
				</p>
			 </div>
		  </div>
		  <table width="100%">
	         <tr>
	            <td width="30%" valign="top" style="text-align: left;">
					<p>Nama Kapal</p>
					<p>Tanda Selar</p>
					<p>Panjang Kapal</p>
	            <td width="5%" valign="top" style="text-align: left;">
					<p>:</p>
					<p>:</p>
					<p>:</p>
				</td>
	            <td width="65%" valign="top" style="text-align: left;">
					<p><?= $model['nama_kapal'] ?></p>
					<p><?= $model['tanda_selar'] ?></p>
					<p id="panjang_kapal_edit_text"></p>
				</td>
	         </tr>
    	  </table>
		  <div class="row">
			 <table class="table table-hover">
				<thead>
				   <tr>
					  <th class="text-center">No</th>
					  <th>Jenis Pembayaran</th>
					  <th class="text-center">Total (Rp)</th>
				   </tr>
				</thead>
				<tbody>
				   <tr>
					  <td class="col-md-1 text-center">1</td>
					  <td class="col-md-8"><em>Tambat</em></td>
					  <td class="col-md-3 text-center" id="harga_tambat">0</td>
				   </tr>
				   <tr>
					  <td class="col-md-1 text-center">2</td>
					  <td class="col-md-8"><em>Tender</em></td>
					  <td class="col-md-3 text-center" id="harga_tender">0</td>
				   </tr>
				   <tr>
					  <td>   </td>
					  <td class="text-right">
						 <p>
							<strong>Subtotal A: </strong>
						 </p>
					  </td>
					  <td class="text-center">
						 <p id="sub_total_a">
							0
						 </p>
					  </td>
				   </tr>
				   <tr>
					  <td class="col-md-1 text-center">3</td>
					  <td class="col-md-8"><em>Kebersihan</em></td>
					  <td class="col-md-3 text-center" id="harga_kebersihan">0</td>
				   </tr>
				   <tr>
					  <td>   </td>
					  <td class="text-right">
						 <p>
							<strong>Subtotal B: </strong>
						 </p>
					  </td>
					  <td class="text-center">
						 <p id="sub_total_b">
							0
						 </p>
					  </td>
				   </tr>
				   <tr>
					  <td>   </td>
					  <td class="text-right">
						 <h4><strong>Jumlah: </strong></h4>
					  </td>
					  <td class="text-center text-danger">
						 <h4 id="harga_total"><strong>0</strong></h4>
					  </td>
				   </tr>
				</tbody>
			 </table>
		  </div>
	</div>
</div>
<div class="non-printable">
	<a type="button" class="btn btn-success btn-lg btn-block" href="https://simponi.kemenkeu.go.id/" target="_blank">
		Buat E-Billing<span class="glyphicon glyphicon-chevron-right"></span>
	</a>
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<?= $form->field($forms, 'id_billing')->textInput(['value'=>'']);?>
	</div>
	<div class="col-md-1"></div>
	<button type="submit" class="btn btn-danger btn-lg btn-block">
		Cetak<span class="glyphicon glyphicon-chevron-right"></span>
	</button>
	<?=$form->field($model, 'loa')->hiddenInput(['value'=>null, 'id' => 'panjang_kapal_edit'])->label(false);?>
</div>

<?php
Modal::end();
?>