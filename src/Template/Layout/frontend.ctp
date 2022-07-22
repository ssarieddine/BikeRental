<!DOCTYPE html>
<html amp lang="en" dir="ltr">
<head><meta charset="utf-8">

<meta name="viewport" content="width=device-width, minimum-scale=1, initial-scale=1,  maximum-scale=1.0"/>
<meta name = "format-detection" content = "telephone=no">
<title>Bike Rental</title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
	<?= $this->Html->css('chosen.css') ?>   

    <?= $this->Html->script('https://code.jquery.com/jquery-1.12.4.min.js') ?>
    <?= $this->Html->script('chosen.jquery') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script');?> 
</head><body>
<div class="container">
<section><?= $this->fetch('content') ?></section>
</div>
</body></html>