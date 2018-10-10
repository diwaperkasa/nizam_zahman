<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchMstKapal */
/* @var $dataProvider yii\data\ActiveDataProvider 
Pengusahaan Pelayanan Pelabuhan*/

$this->title = 'Jasa Kolam Pelabuhan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div  class="container-fluid">
	<div class="row">
		<div class=" col-md-12">
			<h2 align="center"><?= Html::encode($this->title) ?></h2>
			<h3 align="center">Jumlah Kapal di Kolam: <?= (sizeof($dataProviderKapal->models));?> Kapal</h3> 
		</div>
		<div class="col-md-2">
			<p>
			<?= Html::a('Data Kapal Baru', ['create'], ['class' => 'btn btn-success']) ?>
			</p>
			<div class="list-group">
				<a class="list-group-item active">Sub Menu</a>
				<?= Html::a('Daftar Kapal', ['kolam-pelabuhan/daftar-kapal'], ['class' => 'list-group-item']); ?>
				<?= Html::a('Daftar Invoice', ['kolam-pelabuhan/daftar-invoice'], ['class' => 'list-group-item']); ?>
			</div>
		</div>
		<div class="col-md-10">
			<div class="table-responsive">
			    <?= GridView::widget([
			        'dataProvider' => $dataProvider,
			        'filterModel' => $searchModel,
			        'columns' => [
			            //['class' => 'yii\grid\SerialColumn'],

			            'nama_kapal',
			            'panjang_kapal',
			            'tanda_selar',
						
			            ['class' => 'yii\grid\ActionColumn',
							'template' => '{masuk} {keluar} {lihat}',
							'buttons' => [
								'masuk' => function($url, $model, $key) {     // render your custom button
									return	Html::a('Daftar', ['kolam-pelabuhan/masuk','id'=>$model['id']], ['class' => 'btn btn-success']);
								},
								'keluar' => function($url, $model, $key) {     // render your custom button
									return Html::a('Keluar', ['kolam-pelabuhan/keluar','id'=>$model['id']], ['class' => 'btn btn-danger']);
								},
								'lihat' => function($url, $model, $key) {     // render your custom button
									return Html::a('Lihat', ['kolam-pelabuhan/view','id'=>$model['id']], ['class' => 'btn btn-warning', ]);
								}
							]
						]	
			        ]
			    ]); ?>
			</div>	
		</div>		
	</div>
</div>
