<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use kartik\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\MstKapal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="col-sm-6">
	<div class="form-group">
		<div class="col-sm-10">
		<?= $form->field($model, 'nama_kapal')->textInput(['value'=>$model->nama_kapal, 'readOnly'=> true]); ?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-10">
		<?= $form->field($model, 'tanda_selar')->textInput(['value'=>$model->tanda_selar, 'readOnly'=> true]); ?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-10">
		<?= $form->field($forms, 'tanggal_masuk')->textInput(['value'=>$date_now]); ?>
		</div>	
	</div>
	<div class="form-group">
		<div class="col-sm-6">
		<?= Html::submitButton('Simpan', ['class' => 'btn btn-success']); ?>
		</div>
	</div>
</div>

<?= $form->field($forms, 'id_kapal')->hiddenInput(['value'=>$id])->label(false); ?>