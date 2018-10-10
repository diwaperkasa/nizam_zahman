<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title>Tata Kelola dan Pelayanan Usaha</title>

    <?php
        $this->registerCssFile("@web/css/site.css");
        $this->registerCssFile("@web/css/font-awesome.css");
    ?>

    <?php $this->head() ?>
</head>

<body>
<?php $this->beginBody() ?>
<?php
    NavBar::begin([
        //'brandImage' => '@web/img/kkp_logo.png',
        'brandOptions' => ['style'=>"font-size:15px"],
        'brandLabel' => 'TKPU',
        //'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-inverse navbar-fixed-top',
            //'style'=> 'background-color: #e3f2fd;',
            //'id'=>"mainNav",
        ],
    ]);
    $menuItems = [
        ['label' => 'Beranda', 'url' => ['/site/index']],
        ['label' => 'Jasa Layanan',
            'items' => [
                 ['label' => 'Jasa Kolam Pelabuhan', 'url' => ['/kolam-pelabuhan']],
                 '<li class="divider"></li>',
                 ['label' => 'Penggunaan Backhoe Loader', 'url' => ['/backhoe-loader']],
                 '<li class="divider"></li>',
                 ['label' => 'Penggunaan Crane', 'url' => ['/crane']],
                 '<li class="divider"></li>',
                 ['label' => 'Penggunaan Forklift', 'url' => ['/forklift']],
                 '<li class="divider"></li>',
                 ['label' => 'Penggunaan Mobil Reefer', 'url' => ['/mobil-reefer']],
                 '<li class="divider"></li>',
                 ['label' => 'Penggunaan Dump Truck', 'url' => ['/dump-truck']],
                 '<li class="divider"></li>',
                 ['label' => 'Penggunaan Tug Boat', 'url' => ['/tug-boat']],
                 //'<li class="divider"></li>',
                 //['label' => 'Tagihan Listrik', 'url' => ['/tagihan-listrik']],
                 //'<li class="divider"></li>',
                 //['label' => 'Layanan Aduan Konten', 'url' => ['/layanan-aduan']],
                 '<li class="divider"></li>',
                 ['label' => 'Tarif PNBP', 'url' => ['/tarif-pnbp']],
            ]
        ],
        ['label' => 'Tentang', 'url' => ['/site/tentang']],
        ['label' => 'Kontak', 'url' => ['/site/kontak']],
    ];

    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        //$menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
?>
<div class="wrap">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
