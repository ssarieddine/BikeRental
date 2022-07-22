<?php if (!empty($theName)){?><hr/>
    <ul class="side-nav">
        <li class="heading"><?= __('Brands') ?></li>
        <li><?php echo $this->Html->link(
        'Add New',
        '/brands/add',
        ['class' => '']
        );?></li>
        <li><?php echo $this->Html->link(
        'Manage',
        '/brands',
        ['class' => '']
        );?></li>
        <li><hr/></li>
    </ul>

    <ul class="side-nav">
        <li class="heading"><?= __('Vehicle Types') ?></li>
        <li><?php echo $this->Html->link(
        'Add New',
        '/vehicletypes/add',
        ['class' => '']
        );?></li>
        <li><?php echo $this->Html->link(
        'Manage',
        '/vehicletypes/index',
        ['class' => '']
        );?></li>
         <li><hr/></li>
    </ul> 
    
     <ul class="side-nav">
        <li class="heading"><?= __('Attributes') ?></li>
        <li><?php echo $this->Html->link(
        'Add New',
        '/attributes/add',
        ['class' => '']
        );?></li>
        <li><?php echo $this->Html->link(
        'Manage',
        '/attributes/index',
        ['class' => '']
        );?></li>
         <li><hr/></li>
    </ul> 
    
     <ul class="side-nav">
        <li class="heading"><?= __('Vehicles') ?></li>
        <li><?php echo $this->Html->link(
        'Add New',
        '/vehicles/add',
        ['class' => '']
        );?></li>
        <li><?php echo $this->Html->link(
        'Manage',
        '/vehicles/index',
        ['class' => '']
        );?></li>
        
    </ul> 
    
    
    
    <?php }?>