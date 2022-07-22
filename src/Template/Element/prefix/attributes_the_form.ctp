<?php

    echo $this->Form->create($$the_entity, ['type' => 'file']);
   // echo $this->Form->control('main');
	
	echo $this->Form->control('title');
	echo $this->Form->control('vehicle_id', ['multiple'=>'multiple']);
	echo $this->Form->control('value');

    echo $this->Form->button(__('Save'));
    echo $this->Form->end();
?>