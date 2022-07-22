<?php 
header('Content-type: text/xml');
?>
<?= $this->fetch('content') ?>
<?php
die;
?>