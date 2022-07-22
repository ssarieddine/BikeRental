<div style="border:1px solid black; border-radius:5px; margin-bottom:15px; margin-right:15px; padding:15px; max-width:200px;">
<div><?= $bikedetails['title'];?></div>
<div><?= $bikedetails['brand']['title'];?></div>
<div style="font-weight:bold;"><?= $bikedetails['vehicletype']['title'];?></div>
<div><?= '$'.$bikedetails['rent_price'].'/day';?></div>

<?php if (!empty($bikedetails['max_passenger_number'])){?>
<div><?= 'Max Passenger Number: '.$bikedetails['max_passenger_number'];?></div>
<?php }?>
<?php 
if (!empty($bikedetails['the_attributes'])){
	?><div style="font-weight:bold; margin-top:15px;">More Details:</div><?php
	foreach ($bikedetails['the_attributes'] as $a => $value){
		?>
		<div><?php echo $bikedetails['the_attributes'][$a]['attribute']['title'].": ".$bikedetails['the_attributes'][$a]['attribute']['value'];?></div>
		<?php
	} // foreah end 
}
if (empty($rented)){
?>
<form id="Form<?php echo $bikedetails['id'];?>" method="post" action="<?php echo FULL_BASE_URL.$this->request->webroot.'book-this-bike/'.$bikedetails['id'];?>">
<input type="hidden" name="id" value="<?php echo $bikedetails['id'];?>"/>
<input type="button" value="Book" onClick="
$('#Form<?php echo $bikedetails['id'];?>').submit();
return false;"/>
</form>
<?php }else {
// renterd
?>
<div>Rented on: <?php echo date('d, M Y', strtotime($bikedetails['rent_date']));?></div>
<?php 	
}?>
</div>
