<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MstKapal */

$this->title = 'Update Data Kapal';
$this->params['breadcrumbs'][] = ['label' => 'Pengusahaan Pelayanan Pelabuhan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mst-kapal-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		//'forms' => $forms
    ]) ?>

</div>
