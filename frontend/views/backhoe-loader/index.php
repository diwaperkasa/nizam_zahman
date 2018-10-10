<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchMstKapal */
/* @var $dataProvider yii\data\ActiveDataProvider 
Pengusahaan Pelayanan Pelabuhan*/

$this->title = 'Jasa Backhoe Loader';
$this->params['breadcrumbs'][] = $this->title;

$this->registerJsFile(
    '@web/asset/global/index.js',
    ['depends' => [\yii\web\JqueryAsset::className()], 'position' => \yii\web\View::POS_HEAD]
);
$this->registerJsFile(
    '@web/asset/backhoe/index.js',
    ['depends' => [\yii\web\JqueryAsset::className()], 'position' => \yii\web\View::POS_HEAD]
);
?>

<script type="text/javascript">
	var tarif;
</script>

<div class="container-fluid">
	<form method="post" action="<?=Url::to(['/backhoe-loader/create'])?>">
		<div class="col-md-6">
			<form>
				<input id="form-token" type="hidden" name="<?=Yii::$app->request->csrfParam?>" value="<?=Yii::$app->request->csrfToken?>"/>
				<div class="form-group">
				    <label for="person">Nama Peminjam</label>
				    <input type="text" class="form-control" id="nama" placeholder="Nama Lengkap" name="backhoe[peminjam]">
				</div>
				<div class="form-group">
				    <label for="date">Banyak unit</label>
				    <input type="number" class="form-control" id="unit" placeholder="Lama Peminjaman" name="backhoe[unit]" value="1" onchange="hitung_biaya()";>
				</div>
				<div class="form-group">
				    <label for="date">Lama Peminjaman (jam)</label>
				    <input type="number" class="form-control" id="jam" placeholder="Lama Peminjaman" name="backhoe[lama_sewa]" value="0" onchange="hitung_biaya()";>
				</div>
				<button type="submit" class="btn btn-primary">Simpan</button>
			</form>
		</div>
	</form>
	<div class="col-md-6">
		<div>
			<div class="container-fluid">
				<br>
				<p>Tarif PNBP Backhoe Loader PP No 75 2015</p>
				<p>Tarif berdasarkan per jam per unit</p>
				<p>Besaran Tarif: <span id='biaya_tarif'></span></p>
				<hr>
				<p>Biaya: <span id="total_biaya"></span></p>
			</div>
		</div>
	</div>
</div>
