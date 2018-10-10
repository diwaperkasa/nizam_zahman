<?php
use yii\helpers\BaseUrl;
use yii\helpers\Html;
use yii\helpers\Url;

function dateDifference($date_1 , $date_2 , $differenceFormat = '%a' )
{
    $fixed_1 = date('Y-m-d', strtotime($date_1));
	$fixed_2 = date('Y-m-d', strtotime($date_2));
	
	$datetime1 = date_create($fixed_1);
    $datetime2 = date_create($fixed_2);
    
    $interval = date_diff($datetime1, $datetime2);
    
    return $interval->format($differenceFormat) + 1;
    
}
?>

<html>
   <head>
   </head>
   <body>   
      <table width="100%">
         <tr>
            <td width="30%" align="center" valign="midlle">
				<?= Html::img('@web/img/perindo.png', ['width'=>'180', 'height'=>'60']); ?>
            </td>
            <td width="50%" style="text-align: center;">
				<h4>Pelabuhan Perikanan Samudera</h4>
				<h4>Nizam Zachman Jakarta</h4>
				<p>Jalan Muara Baru Ujung Jakarta Utara 14440</p>
				<p>Laman: www.ppsnzj.info Pos Elektronik: ppsnzj@gmail.com</p>
				<p>No Telp: (021) 6617865</p>
            </td>
            <td width="20%" align="center" valign="midlle">
				<?= Html::img('@web/img/kkp.png', ['width'=>'100', 'height'=>'100']); ?>
            </td>
         </tr>
       </table>
		
		<hr>

	  <div style="text-align: center"><b>NOTA PEMBAYARAN</b></div>
      <div style="text-align: right">Tanggal: <?= $date_now; ?></div>
      <table width="100%">
         <tr>
            <td width="20%" style="text-align: left;">
				<br />Nama Kapal
				<br />Tanda Selar
				<br />Panjang Kapal
				<br />Tanggal Masuk
				<br />Tanggal Keluar
				<br />Lama di Kolam
            <td width="5%" style="text-align: left;">
				<br />:
				<br />:
				<br />:
				<br />:
				<br />:
				<br />:
			</td>
            <td width="75%" style="text-align: left;">
				<br /><?= $model['nama_kapal'] ?>
				<br /><?= $model['tanda_selar'] ?>
				<br /><?= $model['loa']." meter" ?>
				<br /><?= $modelKapal['tanggal_masuk'] ?>
				<br /><?= $modelKapal['tanggal_keluar'] ?>
				<br /><?= dateDifference($modelKapal['tanggal_masuk'], $modelKapal['tanggal_keluar']);?> Hari
			</td>
         </tr>
      </table>
      <br />
      <table class="items" width="100%" style="font-size: 9pt; border-collapse: collapse; " cellpadding="8">
         <thead>
            <tr>
               <td width="5%">No</td>
               <td width="45%">Jenis Pembayaran</td>
               <td width="20%">Total</td>
               <td width="30%">Cap Petugas</td>
            </tr>
         </thead>
         <tbody>
            <!-- ITEMS HERE -->
            <tr>
               <td align="center">1</td>
               <td align="left">Tambat</td>
               <td align="center" class="cost">
				   <?php
					$tambat = $model['loa'] * (($modelKapal['tambat_1']*$tarif['tambat_1']) + ($modelKapal['tambat_2']*$tarif['tambat_2']) + ($modelKapal['tambat_10']*$tarif['tambat_10']) + ($modelKapal['hutang_tambat']*$tarif['tambat_10']));
					echo Yii::$app->formatter->asCurrency($tambat);
				   ?>
			   </td>
            </tr>
			<tr>
               <td align="center">2</td>
               <td align="left">Tender</td>
               <td align="center" class="cost">
			      <?php 
					$tender = $model['loa'] * (($modelKapal['tender_1']*$tarif['tender_1']) + ($modelKapal['tender_2']*$tarif['tender_2']) + ($modelKapal['tender_10']*$tarif['tender_10']) + ($modelKapal['hutang_tender']*$tarif['tender_10']));
					echo Yii::$app->formatter->asCurrency($tender);
				  ?>
			   </td>
            </tr>
			<tr>
               <td align="center"></td>
               <td align="right">Subtotal (Tender + Tambat)</td>
               <td align="center" class="cost">
               	  <b>
			      <?php
			      	$subtotal_a = ($tender + $tambat);
					echo Yii::$app->formatter->asCurrency($subtotal_a);
				  ?>
				  </b>
			   </td>
            </tr>
			<tr>
               <td align="center">3</td>
               <td align="left">Kebersihan</td>
               <td align="center" class="cost">
			      <?php 
					$kebersihan = $model['loa']*(($modelKapal['kebersihan']*$tarif['kebersihan_perikanan']) + ($modelKapal['hutang_kebersihan']*$tarif['kebersihan_perikanan']));
					echo Yii::$app->formatter->asCurrency($kebersihan);
				  ?>
			   </td>
			   <td style="border-top: 1px solid #000"></td>
            </tr>
			<tr>
               <td align="center"></td>
               <td align="right">Subtotal (Kebersihan)</td>
               <td align="center" class="cost">
               	  <b>
			      <?php
					$subtotal_b = $kebersihan;
					echo Yii::$app->formatter->asCurrency($subtotal_b);
				  ?>
				  </b>
			   </td>
            </tr>
            <!-- END ITEMS HERE -->
            <tr>
				<td align="center"></td>
				<td align="right"></td>
				<td align="center" class="cost">
					<b>
					</b>
				</td>
            </tr>            
         </tbody>
      </table>
      <div style="text-align: center; font-style: italic;">Syarat Pembayaran: Lakukan pembayaran pada tanggal cetak</div>
	  <div>&nbsp;</div>
	  <div>
	  	<br /> Info Tambahan
	  	<p><?=$modelKapal['keterangan']?></p>
	  </div>
	  <div style="font-style: italic;">
		<br />NB :
		<br />- Nota harap dibawa saat melakukan pembayaran
		<br />- No Rek Perindo: (BNI) 1605-2012-06 a/n: Perum Perikanan Indonesia
		<br />- No E-Billing: <?=$modelKapal['id_billing']?>
		<br />- Resi ini merupakan bukti sah pembayaran tambat labuh dan kebersihan di PPS Nizam Zahman Jakarta
		<br />- Harap dibawa pada saat kapal keluar pelabuhan
	  </div>
	  <table width="100%">
            <tr>
               <td width="50%" style="text-align: center;">
					
			   </td>
               <td width="50%" style="text-align: center;">
					<br />Jakarta
					<br />
					<br />
					<br />
					<br />(Petugas Pelabuhan)
			   </td>
            </tr>
       </table>
	   <div>&nbsp;</div>
	   <div>&nbsp;</div>
	   <div>
			<p style="text-align: center;"><i>Terima kasih Anda telah menggunakan jasa pelayanan Pelabuhan Nizam Zachman. Sampaikan kesan dan saran Anda terhadap kualitas layanan kami melalui petugas pelabuhan</i></p>
	   </div>
   </body>
</html>