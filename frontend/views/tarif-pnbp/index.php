<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\detail\DetailView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchMstKapal */
/* @var $dataProvider yii\data\ActiveDataProvider 
Pengusahaan Pelayanan Pelabuhan*/

$this->title = 'Tarif PNBP';
$this->params['breadcrumbs'][] = $this->title;

// DetailView Attributes Configuration
$section_header_tarif = 'Tarif PNBP';
$attributes = [
	[
        'group'=>true,
        'label'=>'BAGIAN 1: Tarif Tambat Labuh PPS NZJ ('.$tarif['tarif'][array_search('tambat_1', $tarif['header'])]['keterangan'].')',
        'rowOptions'=>['class'=>'info']
    ], 
    [
    	'columns' => [
    		[
		        'attribute'=>'biaya', 
		        'options' => [
		        	'name' => 'pnbp[tambat_1]',
		        	'value'=>$tarif['tarif'][array_search('tambat_1', $tarif['header'])]['biaya'],
		        ],
		        'label'=>'Tambat ke-1',
		        'value'=>$tarif['tarif'][array_search('tambat_1', $tarif['header'])]['biaya'],
		        //'displayOnly'=>true,
		        'valueColOptions'=>['style'=>'width:10%']
		    ],
		    [
		        'attribute'=>'biaya', 
		        'options' => [
		        	'name' => 'pnbp[tambat_2]',
		        	'value'=>$tarif['tarif'][array_search('tambat_2', $tarif['header'])]['biaya'],
		        ],
		        'label'=>'Tambat ke-2',
		        'value'=>$tarif['tarif'][array_search('tambat_2', $tarif['header'])]['biaya'],
		        //'displayOnly'=>true,
		        'valueColOptions'=>['style'=>'width:10%']
		    ],
		    [
		        'attribute'=>'biaya', 
		        'options' => [
		        	'name' => 'pnbp[tambat_10]',
		        	'value'=>$tarif['tarif'][array_search('tambat_10', $tarif['header'])]['biaya'],
		        ],
		        'label'=>'Tambat ke-10',
		        'value'=>$tarif['tarif'][array_search('tambat_10', $tarif['header'])]['biaya'],
		        //'displayOnly'=>true,
		        'valueColOptions'=>['style'=>'width:10%']
		    ],
    	],
    ],
    [
    	'columns' => [
    		[
		        'attribute'=>'biaya', 
		        'options' => [
		        	'name' => 'pnbp[tender_1]',
		        	'value'=>$tarif['tarif'][array_search('tender_1', $tarif['header'])]['biaya'],
		        ],
		        'label'=>'Tender ke-1',
		        'value'=>$tarif['tarif'][array_search('tender_1', $tarif['header'])]['biaya'],
		        //'displayOnly'=>true,
		        'valueColOptions'=>['style'=>'width:10%']
		    ],
		    [
		        'attribute'=>'biaya', 
		        'options' => [
		        	'name' => 'pnbp[tender_2]',
		        	'value'=>$tarif['tarif'][array_search('tender_2', $tarif['header'])]['biaya'],
		        ],
		        'label'=>'Tender ke-2',
		        'value'=>$tarif['tarif'][array_search('tender_2', $tarif['header'])]['biaya'],
		        //'displayOnly'=>true,
		        'valueColOptions'=>['style'=>'width:10%']
		    ],
		    [
		        'attribute'=>'biaya', 
		        'options' => [
		        	'name' => 'pnbp[tender_10]',
		        	'value'=>$tarif['tarif'][array_search('tender_10', $tarif['header'])]['biaya'],
		        ],
		        'label'=>'Tender ke-10',
		        'value'=>$tarif['tarif'][array_search('tender_10', $tarif['header'])]['biaya'],
		        //'displayOnly'=>true,
		        'valueColOptions'=>['style'=>'width:10%']
		    ],
    	],
    ],
    [
    	'columns' => [
    		[
		        'attribute'=>'biaya', 
		        'options' => [
		        	'name' => 'pnbp[kebersihan_perikanan]',
		        	'value'=>$tarif['tarif'][array_search('kebersihan_perikanan', $tarif['header'])]['biaya'],
		        ],
		        'label'=>'Kebersihan Perikanan',
		        'value'=>$tarif['tarif'][array_search('kebersihan_perikanan', $tarif['header'])]['biaya'],
		        //'displayOnly'=>true,
		        'valueColOptions'=>['style'=>'width:10%']
		    ],
		    [
		        'attribute'=>'biaya', 
		        'options' => [
		        	'name' => 'pnbp[kebersihan_non_perikanan]',
		        	'value'=>$tarif['tarif'][array_search('kebersihan_non_perikanan', $tarif['header'])]['biaya'],
		        ],
		        'label'=>'Kebersihan Non Perikanan',
		        'value'=>$tarif['tarif'][array_search('kebersihan_non_perikanan', $tarif['header'])]['biaya'],
		        //'displayOnly'=>true,
		        'valueColOptions'=>['style'=>'width:10%']
		    ],
    	],
    ],
    [
        'group'=>true,
        'label'=>'BAGIAN 2: Tarif Sewa Kendaraan/Alat Berat',
        'rowOptions'=>['class'=>'info']
    ],  
    [
    	'attribute'=>'biaya', 
        'options' => [
        	'name' => 'pnbp[backhoe]',
        	'value'=>$tarif['tarif'][array_search('backhoe', $tarif['header'])]['biaya'],
        ],
        'label'=>'Backhoe Loader ('.$tarif['tarif'][array_search('backhoe', $tarif['header'])]['keterangan'].')',
        'value'=>$tarif['tarif'][array_search('backhoe', $tarif['header'])]['biaya'],
        //'displayOnly'=>true,
        'valueColOptions'=>['style'=>'width:10%']
    ], 
    [
    	'attribute'=>'biaya', 
        'options' => [
        	'name' => 'pnbp[crane]',
        	'value'=>$tarif['tarif'][array_search('crane', $tarif['header'])]['biaya'],
        ],
        'label'=>'Crane ('.$tarif['tarif'][array_search('crane', $tarif['header'])]['keterangan'].')',
        'value'=>$tarif['tarif'][array_search('crane', $tarif['header'])]['biaya'],
        //'displayOnly'=>true,
        'valueColOptions'=>['style'=>'width:10%']
    ],
    [
    	'attribute'=>'biaya', 
        'options' => [
        	'name' => 'pnbp[forklift]',
        	'value'=>$tarif['tarif'][array_search('forklift', $tarif['header'])]['biaya'],
        ],
        'label'=>'Forklift ('.$tarif['tarif'][array_search('forklift', $tarif['header'])]['keterangan'].')',
        'value'=>$tarif['tarif'][array_search('forklift', $tarif['header'])]['biaya'],
        //'displayOnly'=>true,
        'valueColOptions'=>['style'=>'width:10%']
    ],
    [
    	'attribute'=>'biaya', 
        'options' => [
        	'name' => 'pnbp[refer]',
        	'value'=>$tarif['tarif'][array_search('refer', $tarif['header'])]['biaya'],
        ],
        'label'=>'Mobil Reefer/Berpendingin ('.$tarif['tarif'][array_search('refer', $tarif['header'])]['keterangan'].')',
        'value'=>$tarif['tarif'][array_search('refer', $tarif['header'])]['biaya'],
        //'displayOnly'=>true,
        'valueColOptions'=>['style'=>'width:10%']
    ],
    [
    	'attribute'=>'biaya', 
        'options' => [
        	'name' => 'pnbp[dump_truck]',
        	'value'=>$tarif['tarif'][array_search('dump_truck', $tarif['header'])]['biaya'],
        ],
        'label'=>'Mobil Dump Truck ('.$tarif['tarif'][array_search('dump_truck', $tarif['header'])]['keterangan'].')',
        'value'=>$tarif['tarif'][array_search('dump_truck', $tarif['header'])]['biaya'],
        //'displayOnly'=>true,
        'valueColOptions'=>['style'=>'width:10%']
    ],
    [
    	'attribute'=>'biaya', 
        'options' => [
        	'name' => 'pnbp[tug_boat]',
        	'value'=>$tarif['tarif'][array_search('tug_boat', $tarif['header'])]['biaya'],
        ],
        'label'=>'Mobil Tug Boat ('.$tarif['tarif'][array_search('tug_boat', $tarif['header'])]['keterangan'].')',
        'value'=>$tarif['tarif'][array_search('tug_boat', $tarif['header'])]['biaya'],
        //'displayOnly'=>true,
        'valueColOptions'=>['style'=>'width:10%']
    ],
];
?>

<div class="container-fluid">
	<?php
	// View file rendering the widget
	echo DetailView::widget([
	    'model' => $model,
	    'attributes' => $attributes,
	    'mode' => 'view',
	    'bordered' => true,
	    'striped' => true,
	    'condensed' => true,
	    'responsive' => true,
	    'hover' => true,
	    'hAlign'=>DetailView::ALIGN_LEFT,
	    'vAlign'=>DetailView::ALIGN_LEFT,
	    'fadeDelay'=>100,
	    'mode'=>DetailView::MODE_VIEW,
	    'panel'=>[
	        'heading'=>$section_header_tarif,
	        'type'=>DetailView::TYPE_INFO,
	    ],
	    'deleteOptions'=>[ // your ajax delete parameters
	        'params' => ['id' => 1000, 'kvdelete'=>true],
	    ],
	    'container' => ['id'=>'kv-demo'],
	    //'formOptions' => ['action' => Url::current(['#' => 'kv-demo'])] // your action to delete
	]);
	
	?>
</div>
