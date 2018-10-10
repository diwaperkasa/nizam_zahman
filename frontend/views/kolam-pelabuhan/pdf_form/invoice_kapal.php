<?php

$html = '
<html>
   <head>
      <style>
         body {font-family: sans-serif;
         font-size: 10pt;
         }
         p {	margin: 0pt; }
         table.items {
         border: 0.1mm solid #000000;
         }
         td { vertical-align: top; }
         .items td {
         border-left: 0.1mm solid #000000;
         border-right: 0.1mm solid #000000;
         }
         table thead td { background-color: #EEEEEE;
         text-align: center;
         border: 0.1mm solid #000000;
         font-variant: small-caps;
         }
         .items td.blanktotal {
         background-color: #EEEEEE;
         border: 0.1mm solid #000000;
         background-color: #FFFFFF;
         border: 0mm none #000000;
         border-top: 0.1mm solid #000000;
         border-right: 0.1mm solid #000000;
         }
         .items td.totals {
         text-align: right;
         border: 0.1mm solid #000000;
         }
         .items td.cost {
         text-align: "." center;
         }
      </style>
   </head>
   <body>
      
      <!--mpdf
       
      <htmlpageheader name="myheader">
         <table width="100%">
            <tr>
               <td width="40%" style="text-align: center;">
				  <img src="http://4.bp.blogspot.com/-Si3eTr32-T8/Uyh0k9tVXqI/AAAAAAAAQR8/LLwCrDUkExo/s1600/LOGO+PERIKANAN+INDONESIA.png" alt="Flowers in Chania" width="240" height="80">
               </td>
               <td width="40%" style="text-align: left;">
                  <h3>Pelabuhan Nizam Zachman</h3>
				  <p>Jalan Tuna Raya No.1, Kelurahan Penjaringan, Kecamatan Penjaringan, RT.20/RW.17, Penjaringan, Kota Jkt Utara, Daerah Khusus Ibukota Jakarta 14440</p>
				  <p>No Telp: (021) 6617866</p>
               </td>
               <td width="20%" style="text-align: center;">
				  <img src="https://upload.wikimedia.org/wikipedia/id/4/48/LOGO_KEMENTERIAN_KELAUTAN_DAN_PERIKANAN.png" alt="Flowers in Chania" width="100" height="100">
               </td>
            </tr>
         </table>
		 <hr>
      </htmlpageheader>
      
      <htmlpagefooter name="myfooter">
          <div style="border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; ">
            Page {PAGENO} of {nb}
          </div>
      </htmlpagefooter>
    
      <sethtmlpageheader name="myheader" value="on" show-this-page="1" />
      <sethtmlpagefooter name="myfooter" value="on" />
      mpdf-->
      
	  <div style="text-align: center"><b>NOTA PEMBAYARAN</b></div>
      <div style="text-align: right">Tanggal: 8 April 2018</div>
      <table width="100%" style="font-family: serif;">
         <tr>
            <td width="20%" style="text-align: left;">
				<br />Nama Kapal
				<br />Tanda Selar/GT
				<br />Tanggal Masuk
				<br />Tanggal Keluar
				<br />Lama di Kolam
            <td width="5%" style="text-align: left;">
				<br />:
				<br />:
				<br />:
				<br />:
				<br />:
			</td>
            <td width="75%" style="text-align: left;">
				<br />Baruna Jaya
				<br />001
				<br />2 Juni 2018
				<br />3 Juni 2018
				<br />3 Hari
			</td>
         </tr>
      </table>
      <br />
      <table class="items" width="100%" style="font-size: 9pt; border-collapse: collapse; " cellpadding="8">
         <thead>
            <tr>
               <td width="5%">No</td>
               <td width="75%">Jenis Pembayaran</td>
               <td width="20%">Total (Rp)</td>
            </tr>
         </thead>
         <tbody>
            <!-- ITEMS HERE -->
            <tr>
               <td align="center">1</td>
               <td align="left">Tambat</td>
               <td class="cost">
				   300000
			   </td>
            </tr>
			<tr>
               <td align="center">2</td>
               <td align="left">Tender</td>
               <td class="cost">
			      500000
			   </td>
            </tr>
			<tr>
               <td align="center"></td>
               <td align="right">Subtotal (Tender + Tambat)</td>
               <td class="cost">
			      500000
			   </td>
            </tr>
			<tr>
               <td align="center">3</td>
               <td align="left">Kebersihan</td>
               <td class="cost">
			      600000
			   </td>
            </tr>
			<tr>
               <td align="center"></td>
               <td align="right">Subtotal (Kebersihan)</td>
               <td class="cost">
			      500000
			   </td>
            </tr>
            <!-- END ITEMS HERE -->
            <tr>
               <td class="blanktotal" colspan="1" rowspan="1"></td>
               <td class="totals"><b>TOTAL:</b></td>
               <td class="totals cost"><b>1400000</b></td>
            </tr>            
         </tbody>
      </table>
      <div style="text-align: center; font-style: italic;">Syarat: Lakukan pembayaran pada tanggal cetak</div>
	  <div>
		<p>NB :</P>
		<p>- Nota Harap dibawa saat melakukan pembayaran</P>
		<p>- No Rek Perindo: </P>
		<p>- No Rek Perindo: </P>
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
   </body>
</html>
';

$path = (getenv('MPDF_ROOT')) ? getenv('MPDF_ROOT') : __DIR__;
require_once $path . '/../../../vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf([
	'margin_left' => 20,
	'margin_right' => 15,
	'margin_top' => 48,
	'margin_bottom' => 25,
	'margin_header' => 10,
	'margin_footer' => 10
]);

$mpdf->SetProtection(array('print'));
$mpdf->SetTitle("Pelabuhan Nizam Zachman - Invoice");
$mpdf->SetAuthor("Acme Trading Co.");
//$mpdf->SetWatermarkText("ppsnzj");
$mpdf->showWatermarkText = true;
$mpdf->watermark_font = 'DejaVuSansCondensed';
$mpdf->watermarkTextAlpha = 0.1;
$mpdf->SetDisplayMode('fullpage');

$mpdf->WriteHTML($html);

$mpdf->Output();
