<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;
?>

<div class="col-md-6">
	<h3 class="TextDanger">Kapal Belum Terdaftar di Kolam Pelabuhan</h3>
	<h3><small>Silahkan lakukan pendaftaran kapal pada </small>
	<?= Html::a('Link', ['kolam-pelabuhan/masuk','id'=>$model['id']], ['class' => 'badge']);?>
	<small> ini</small></h3>
</div>