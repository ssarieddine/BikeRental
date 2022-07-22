<?php
if (!empty($$the_entity['id'])){ // Edit
	$dateValue=$$the_entity['date_published']->format('Y-m-d H:i');
}else{
	$dateValue='';
}

    echo $this->Form->create($$the_entity, ['type' => 'file']);	
	echo $this->Form->control('title');
	echo $this->Form->control('brand_id');
	echo $this->Form->control('vehicletype_id', ['label'=>'Vehicle Type']);
	echo $this->Form->control('rent_price', ['label' => 'Rent Price/Day', 'placeholder' => 'in USD']);
	echo $this->Form->control('rented');
	echo $this->Form->control('rent_date');
	echo $this->Form->control('max_passenger_number');

    echo $this->Form->button(__('Save'));
    echo $this->Form->end();
?>