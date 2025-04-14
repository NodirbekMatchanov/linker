<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Url;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
$this->title = Yii::t('meta', 'Быстрое сокращение ссылок и генерация QR-кодов | LinkShort');

$this->registerMetaTag(['name' => 'description', 'content' => Yii::t('meta', 'Сократите длинные ссылки и создайте QR-коды за секунды. Бесплатно, быстро и удобно.')]);
$this->registerMetaTag(['name' => 'keywords', 'content' => Yii::t('meta', 'сокращение ссылок, qr код, генерация qr, короткие ссылки, short link, url shortener, qr generator, бесплатный qr, сделать ссылку короче')]);
$this->registerMetaTag(['name' => 'author', 'content' => 'LinkShort']);
$this->registerMetaTag(['name' => 'robots', 'content' => 'index, follow']);

$this->registerMetaTag(['property' => 'og:title', 'content' => Yii::t('meta', 'Сокращение ссылок и генерация QR-кодов — LinkShort')]);
$this->registerMetaTag(['property' => 'og:description', 'content' => Yii::t('meta', 'Удобный инструмент для сокращения ссылок и создания QR-кодов. Без регистрации и бесплатно.')]);
$this->registerMetaTag(['property' => 'og:image', 'content' => \yii\helpers\Url::to('/images/preview.png', true)]);
$this->registerMetaTag(['property' => 'og:url', 'content' => Url::to('', true)]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<!-- ***** Preloader Start ***** -->
<div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</div>
<!-- ***** Preloader End ***** -->

<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php
                NavBar::begin([
                    'brandLabel' => '<a href="/" class="logo"><h4>Quick<span>Linker</span></h4></a>',  // Логотип

                    'brandUrl' => Yii::$app->homeUrl,
                    'options' => [
                        'class' => 'main-nav navbar-expand-lg navbar-light',  // Применение кастомных классов
                    ],
                ]);

                echo Nav::widget([
                    'options' => ['class' => 'nav navbar-nav'],
                    'items' => [
                        ['label' => 'Home', 'url' => '#top', 'active' => true],
                        ['label' => 'About Us', 'url' => '#portfolio'],
                        ['label' => 'Faq', 'url' => '#services'],
                        ['label' => 'Message Us', 'url' => '#contact'],
                        [
                            'label' => 'Contact Now',
                            'url' => '#contact',
                            'options' => ['class' => 'main-red-button'],
                        ],
                    ],
                ]);

                echo Html::a('Menu', '#', ['class' => 'menu-trigger']);

                NavBar::end();
                ?>
            </div>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->

<main id="main" class="flex-shrink-0" role="main">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
</main>


<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.25s">
                <p>© Copyright <?php echo date('Y') ?> RareDevLabs.

            </div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
