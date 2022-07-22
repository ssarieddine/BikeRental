<nav class="large-3 medium-4 columns" id="actions-sidebar">
<?php echo $this->element('/prefix/prefix_menu');?>  
</nav>
<div class="types index large-9 medium-8 columns content">
<h1><?= h($data->title) ?></h1>
<p><?= $data->body ?></p>
<p><small>Created: <?= $data->created->format(DATE_RFC850) ?></small></p>
<p><?= $this->Html->link('Edit', ['action' => 'edit', $data->slug]) ?></p>
</div>