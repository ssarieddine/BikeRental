<div>
<h1>Bike Rental</h1>

<h3>Available Bikes</h3>
<?php if (!empty($theVehicles)){
	?><div style="display:flex"><?php
	foreach ($theVehicles as $i =>$value){
		if (empty($theVehicles[$i]['rented'])){
			echo $this->element('bike_details', ['bikedetails' => $theVehicles[$i]]);
		}
	} // foreach end 
?></div><?php	
}else{
	echo "No data available";
}?>

<h3>Rented Bikes</h3>
<?php if (!empty($theVehicles)){
	?><div style="display:flex"><?php
	foreach ($theVehicles as $i =>$value){
		if (!empty($theVehicles[$i]['rented'])){
			echo $this->element('bike_details', ['bikedetails' => $theVehicles[$i], 'rented' => true]);
		}
	} // foreach end 
?></div><?php	
}else{
	echo "No data available";
}?>
</div>