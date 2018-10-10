<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MstKapal */

$this->title = 'Daftar Kapal Baru';
$this->params['breadcrumbs'][] = ['label' => 'Pengusahaan Pelayanan Pelabuhan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nama_kapal, 'url' => ['view', 'id' => $model->id]];

include 'function.php';
?>

<div class="mst-kapal-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('masuk_form', [
    	'id' => $id,
        'model' => $model,
		'forms' => $forms,
		'dataProviderKapal' => $dataProviderKapal,
		'date_now' => $date_now,
    ]) ?>

</div>
