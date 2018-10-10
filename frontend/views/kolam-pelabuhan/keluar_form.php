<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;

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

<script type="text/javascript">
var tarif_pnbp = <?=json_encode($tarif['tarif'])?>;
var header_tarif = <?=json_encode($tarif['header'])?>;

function get_tarif(jenis_tarif) {
	var index = header_tarif.indexOf(jenis_tarif);
	var tarif = tarif_pnbp[index]['biaya'];
	return tarif;
}
</script>

<div class="mst-kapal-form">
	<div class="container-fluid" style="border:3px solid #cecece; border-radius: 25px;">
    <?php 
		$form = ActiveForm::begin([
	                'id' => 'form-kapal',
					'options' => ['class' => 'form-horizontal']
	            ]); 
		$model_kapal_kolam = $dataProviderKapal->models;
		$id_kapal_kolam = getId($model_kapal_kolam,$id);
		if (is_null($id_kapal_kolam) == False)
		{
			if (strval($model_kapal_kolam[$id_kapal_kolam]['id_kapal']) == $id)
			{
				include 'keluar_form_accept.php';
			}
		}
		//if (!findName($dataProviderKapal->models,$model->nama_kapal))
		//if ($model_kapal_kolam['id_kapal'] == $id)
		else
		{
			include 'keluar_form_denied.php';
		}
	?>
	<?php ActiveForm::end(); ?>
	</div>
</div>