<?php

/** @var \yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body id="page-top">
    <?php $this->beginBody() ?>
    <div id="wrapper">
   
            <?php require_once('lyt_sidebar.php'); ?>
            <?php require_once('lyt_content.php'); ?>
     

    </div>
    <?php if(!Yii::$app->user->isGuest) { ?>
    <?php require_once('lyt_scroll.php'); ?>

    <?php require_once('lyt_modal.php'); ?>

    <?php } ?>
    <?= $this->blocks['bodyEndScript'] ?? '' ?>
    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage();
