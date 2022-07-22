<nav class="large-3 medium-4 columns" id="actions-sidebar">
<?php echo $this->element('/prefix/prefix_menu');?>  
</nav>
<div class="types index large-9 medium-8 columns content">
    <h3><?= $page_title ?></h3>    
   
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col" class="listingHead"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col" class="listingHead"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col" class="listingHead"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="listingHead"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $datanum): ?>
            <tr>
                <td><?= h($datanum->id) ?></td>
                <td><?php
				if(!empty($datanum->title)){
					echo $datanum->title;
				}else if(!empty($datanum->name)){
					echo $datanum->name;
				}
				 ?></td>
                
                <td><?= h($datanum->created) ?></td>
                <td><?= h($datanum->modified) ?></td>
                <td class="actions">
                    <?php
					
						$pVar = $datanum->id;	
					
					echo $this->Html->link($this->Html->image("edit.png", ["alt" => "Edit"]), ['action' => 'edit', $pVar],
					['escape' => false]);?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>