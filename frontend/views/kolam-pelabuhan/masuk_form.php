<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MstKapal */
/* @var $form yii\widgets\ActiveForm */
?>

<style>
.TextDanger
{
 color: red;
}
</style>

<div class="mst-kapal-form">
	<div class="container-fluid" style="border:3px solid #cecece; border-radius: 25px;">
    <?php $form = ActiveForm::begin([
                'id' => 'form-kapal',
				'options' => ['class' => 'form-horizontal']
            ]); 
	$model_kapal_kolam = $dataProviderKapal->models;
	$id_kapal_kolam = getId($model_kapal_kolam,$id);

	if (is_null($id_kapal_kolam) == False)
	{
		if ($model_kapal_kolam[$id_kapal_kolam]['id_kapal'] == $id)
		{
			include 'masuk_form_denied.php';
		}
	}
	else
	{
		include 'masuk_form_accept.php';
	}
?>
	</div>
    <?php ActiveForm::end(); ?>
</div>