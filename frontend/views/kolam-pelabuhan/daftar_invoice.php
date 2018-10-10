<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use app\models\MstKapal;
use yii\data\ArrayDataProvider;
use kartik\export\ExportMenu;
/* @var $this yii\web\View */
/* @var $model app\models\MstKapal */

$this->title = 'Daftar Inovice';
$this->params['breadcrumbs'][] = ['label' => 'Jasa Kolam Pelabuhan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-2">
	<div class="list-group">
		<a class="list-group-item active">Sub Menu</a>
		<?= Html::a('Daftar Kapal', ['kolam-pelabuhan/daftar-kapal'], ['class' => 'list-group-item']); ?>
		<?= Html::a('Daftar Invoice', ['kolam-pelabuhan/daftar-invoice'], ['class' => 'list-group-item']); ?>
	</div>
</div>
<div class="col-md-10">
    <?= "Unduh Data: ".ExportMenu::widget([
            'dataProvider' => $allData,
            //'models' => $allData->allModell,
            'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'nama_kapal',
                    'tanda_selar',
                    'panjang_kapal',
                    'tanggal_masuk',
                    'tanggal_keluar',           
                    [
                        'attribute' => 'No Invoice',
                        'value' => function ($model){
                            return $model['id'];
                        },
                    ],
                ],
        ]);
    ?>
	<div class="table-responsive">
	<?= GridView::widget([
                    'dataProvider' => $DataProvider,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'nama_kapal',
                        //'tanda_selar',
                        'tanggal_masuk',
                        'tanggal_keluar',
                        [
                        'attribute' => 'No Invoice',
                        'value' => function ($model){
                            return $model['id'];
                        },
                    ],
                        
                        ['class' => 'yii\grid\ActionColumn',
                            'template' => '{report}',
                            'buttons' => [
                                'report' => function($url, $model, $key) {     // render your custom button
                                    return Html::a('Invoice', ['kolam-pelabuhan/report','id'=>$model['id']], ['class' => 'btn btn-success', 'target'=>"_blank"]);
                                },
                            ]
                        ],
                    ],
                ]); 
    ?>
	</div>
</div>