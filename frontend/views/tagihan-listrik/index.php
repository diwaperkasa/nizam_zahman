<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchMstKapal */
/* @var $dataProvider yii\data\ActiveDataProvider 
Pengusahaan Pelayanan Pelabuhan*/

$this->title = 'Jasa Tagihan Listrik';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid">
	<h3>Tagihan Listrik</h3>
	<div class="row">
		<div class="form-group col-md-12">
			<label>Nama Pelanggan</label>
			<input type="text" name="listrik[kwh_awal]" class="form-control" id="nama_pelanggan">
		</div>
		<div class="col-md-4">
			<button class="btn btn-primary">Pelanggan Baru</button>
		</div>
		<div id="detail_pelanggan">
		</div>
	</div>
	<hr class="my-4">
	<div class="row">
		<div class="form-group col-md-6">
			<label>KWh Awal</label>
			<input type="text" name="listrik[kwh_awal]" class="form-control">
		</div>
		<div class="form-group col-md-6">
			<label>KWh Akhir</label>
			<input type="text" name="listrik[kwh_akhir]" class="form-control">
		</div>
		<div class="form-group col-md-12">
			<label>Selisih</label>
			<input type="text" name="listrik[kwh_akhir]" class="form-control" readonly="true">
		</div>
		<div class="form-group col-md-6">
			<label>Biaya</label>
			<input type="text" name="listrik[kwh_akhir]" class="form-control" readonly="true">
		</div>
		<div class="form-group col-md-6">
			<label>Pajak 10%</label>
			<input type="text" name="listrik[kwh_akhir]" class="form-control" readonly="true">
		</div>
		<div class="form-group col-md-12">
			<label>Total</label>
			<input type="text" name="listrik[kwh_akhir]" class="form-control" readonly="true">
		</div>
	</div>
</div>
