<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="container text-center">
    <div class="logo-404">
        <a href="<?=\yii\helpers\Url::home()?>"><?=Html::img('@web/images/home/logo.png', ['alt' => 'E-SHOPPER'])?></a>
    </div>
    <div class="content-404">
        <?=Html::img('@web/images/404/404.png', ['alt' => '404', 'class' => 'img-responsive']) ?>
        <h1><?= Html::encode($this->title) ?></h1>
        <!--<p>Uh... So it looks like you brock something. The page you are looking for has up and Vanished.</p>
        <h2><a href="index.html">Bring me back Home</a></h2>-->
    </div>
    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>
</div>