<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use app\models\MstKapal;
use yii\data\ArrayDataProvider;
/* @var $this yii\web\View */
/* @var $model app\models\MstKapal */

$this->title = 'Daftar Kapal';
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
    <div class="table-responsive">
        <?php
            $DataProvider = new ArrayDataProvider([
                'allModels' => $hasil,
                'pagination' => [
                    //'pageSize' => 10,
                    'defaultPageSize' => 10,
                ],
                'sort' => [
                    'attributes' => ['tanggal_masuk','nama_kapal','tanggal_keluar'],
                ],
            ]);
        ?>
        <?= GridView::widget([
                    'dataProvider' => $DataProvider,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'nama_kapal',
                        'tanda_selar',
                        'tanggal_masuk',

                        ['class' => 'yii\grid\ActionColumn',
                            'template' => '{keluar} {lihat}',
                            'buttons' => [
                                'keluar' => function($url, $model, $key) {     // render your custom button
                                    return Html::a('Keluar', ['kolam-pelabuhan/keluar','id'=>$model['id_kapal']], ['class' => 'btn btn-danger']);
                                },
                                'lihat' => function($url, $model, $key) {     // render your custom button
                                    return Html::a('Lihat', ['kolam-pelabuhan/view','id'=>$model['id_kapal']], ['class' => 'btn btn-warning']);
                                }
                            ]
                        ],
                    ],
                ]); 
        ?>
    </div>
</div>
