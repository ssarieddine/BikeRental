<nav class="large-3 medium-4 columns" id="actions-sidebar">
<?php echo $this->element('/prefix/prefix_menu');?>  
</nav>
<div class="types index large-9 medium-8 columns content"><h1><?php echo $page_title;?></h1>
<?php
	echo $this->element('/prefix/'.$the_table.'_the_form', array($the_entity => $$the_entity));
?>
</div>