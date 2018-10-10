<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MstKapal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="col-md-6">
	<h3 class="TextDanger">Kapal Masih Berada di Kolam Pelabuhan</h3>
	<h3><small>Silahkan lakukan pembayaran pada </small>
	<?=Html::a('Link', ['kolam-pelabuhan/keluar','id'=>$model['id']], ['class' => 'badge']);?>
	<small> ini</small></h3>
</div>