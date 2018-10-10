<?php
use wadeshuler\sliderrevolution\SliderRevolution;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>

<div class="container-fliud">
    <?php
    $config = ['delay' => 9000, 'startwidth' => 1170, 'startheight' => 500, 'hideThumbs' => 10, 'fullWidth' => '"on"', 'forceFullWidth' => '"on"'];
    $container = ['class' => 'tp-banner-container'];
    $wrapper = ['class' => 'tp-banner'];
    $ulOptions = ['class' =>'my-ul'];

    $slides = [
        [
            'options' => ['data' => ['transition' => 'fade', 'slotamount' => '2', 'masterspeed' => '1500']],
            'image' => ['src' => '@web/img/kapal_ppsnzj.jpg', 'options' => ['alt' => 'slidebg1', 'data' => ['bgfit' => 'cover', 'bgposition' => 'left center', 'bgrepeat' => 'no-repeat']]],
            'layers' => [
                [
                    'options' => ['class' => 'tp-caption lft', 'data' => ['x' => 'center', 'y' => 'top', 'hoffset' => '0', 'voffset' => '50', 'speed' => '2500', 'start' => '1200', 'easing' => 'Power4.easeOut', 'endspeed' => '300', 'endeasing' => 'Power1.easeIn', 'captionhidden' => 'off'], 'style' => 'z-index: 6'],
                    'content' => '<h3>Pelayanan Jasa Pengusahaan PPS Nizam Zachman</h3>'
                ],
                [
                    'options' => ['class' => 'tp-caption lfr', 'data' => ['x' => 'center', 'y' => 'bottom', 'hoffset' => '0', 'voffset' => '-50', 'speed' => '2500', 'start' => '1800', 'easing' => 'Power4.easeOut', 'endspeed' => '300', 'endeasing' => 'Power1.easeIn', 'captionhidden' => 'off'], 'style' => 'z-index: 6'],
                    'content' => ''
                ],
            ],
        ]
    ];

    echo SliderRevolution::widget([
        'config' => $config,
        'container' => $container,
        'wrapper' => $wrapper,
        'ulOptions' => $ulOptions,
        'slides' => $slides
    ]);
?>
    <br>
    <h2 align="center">PPS Nizam Zahman Jakarta</h2>
    <br>
    <div class="container">
        <p class="lead">
            Pelabuhan Perikanan Samudera Nizam Zachman Jakarta didirikan pada tahun 1980 dan diresmikan pada tanggal 17 Juli 1984 dengan nama Pelabuhan Perikanan Samudera Jakarta (PPSJ). Sesuai dengan SK Menteri Kelautan dan Perikanan Nomor KEP.04/MEN/2004 tentang perubahan nama PPSJ menjadi PPSNZJ.
        </p>
        <p class="lead">
            PPSNZJ sebagai Unit Pelaksana Teknis bertanggung jawab kepada Direktorat Jenderal Perikanan Tangkap, Kementerian Kelautan dan Perikanan mempunyai fungsi pemerintahan dan fungsi pengusahaan sesuai dengan Peraturan Menteri Kelautan dan Perikanan Nomor PER.08/MEN/2012 tentang Kepelabuhan Perikanan.
        </p>
        <p class="lead">
            Fungsi pengusahaan merupakan fungsi untuk melaksanakan pengusahaan berupa penyediaan dan/atau pelayanan jasa kapal perikanan dan jasa terkait di pelabuhan perikanan yang meliputi :
        </p>
        <dl class="lead">
            <!--dt>Coffee</dt-->
            <dd>- Pelayanan Tambat dan Labuh Kapal Perikanan</dd>
            <!--dt>Milk</dt-->
            <dd>- Pemasaran dan Distribusi Ikan</dd>
            <dd>- Pemanfaatan Fasilitas dan Lahan di Pelabuhan perikanan</dd>
            <dd>- Pelayanan Perbaikan dan Pemeliharaan Kapal Perikanan</dd>
            <dd>- Pelayanan Logistik dan Perbekalan Kapal Perikanan</dd>
            <dd>- Wisata Bahari</dd>
            <dd>- Pelayanan Bongkar Muat Ikan</dd>
            <dd>- Penyediaan dan/atau Pelayanan Jasa Lainnya Sesuai Dengan Peraturan Perundang-Undangan</dd>
        </dl> 
    </div>
</div>