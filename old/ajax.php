<?php
include('inc/AutoLoad.php');
/*Spot finds*/
if(isset($_POST['action']) AND $_POST['action'] == "find_spot"){
	$placeId = $_POST['id'];
	$con = new Db();
	$tourPlace  = new TravelPlace($placeId,$con);
	$needTODisplay = $tourPlace->getSpotsId($_POST['from'],$_POST['to']);
	$isFound = false;
	if( isset($tourPlace->tourist_spot['spots']) && !empty($tourPlace->tourist_spot['spots'])){
		foreach ($tourPlace->tourist_spot['spots'] as $keySpots => $valueSpots1) {
			foreach ($tourPlace->tourist_spot['spots'] as $keySpotsInner => $valueSpots2) {
				$tempSpotId = $tourPlace->getSpotsId($valueSpots1,$valueSpots2);
				if($needTODisplay != $tempSpotId)
					continue;
				if(isset($tourPlace->tourist_spot['journey'][$tempSpotId])){
					$isFound  = true;
					$tempJournyData = $tourPlace->tourist_spot['journey'][$tempSpotId];
			    		foreach ($tempJournyData['vehicle'] as $keyVehicle => $valueVehicle) {
			    			?>
			    			<li>
								<h2><?php echo $tempJournyData['vehicle'][$keyVehicle]; ?> <strong><?php echo $tempJournyData['fare'][$keyVehicle]; ?></strong></h2>
								<p>Estimate Distance: <?php echo $tempJournyData['distance']; ?><br>Estimate time:<?php echo $tempJournyData['time'][$keyVehicle]; ?></p>
							</li>
			    			<?php
			    		}
				}
			}
			?>
				
			<?php
		}
	}
	if(!$isFound){
		echo "<li>
			<h2>Nothing found!. Please try again.</h2>
		</li>";
	}
}

if(isset($_POST['action']) AND $_POST['action'] == "package_form"){
	?>
	<div class="col-xs-12 col-sm-4">
		<div class="single_package">
			<button type="button" class="btn btn-danger remove_package btn-sm"><i class="fa fa-times"></i></button>

			<label>Package Name</label>
			<input class="form-control package_name" required name="package[]" type="text">
			<label>Price</label>
			<input class="form-control" required name="price[]" type="text">
			<label>Details</label>
			<input class="form-control" required name="details[]" type="text">
			<h5>Items</h5>
			<hr>
			<div class="package_items">
			</div>
			<br>
			<button class="btn btn-primary add_item" type="button">New Item</button>
		</div>
	</div>
	<?php
}