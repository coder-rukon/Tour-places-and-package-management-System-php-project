<?php
	if(!isset($_GET['edit']))
	return;
	$placeId = $_GET['edit'];
	$con = new Db();
	$rsGlobals = new RsGlobal($con->con,"restaurant");
	$allRestaurant = $rsGlobals->get();
	
	$travelPlace = new TravelPlace(null ,$con);
	$allTouristPlace = $travelPlace->get();
	$message= "";
	$isError= false;
	if(isset($_POST['submit'])){
		$name = $_POST['name'];
		$details = $_POST['details'];
		//$address = $_POST['address'];
		$gmap = $_POST['gmap'];
		$division = $_POST['division'];
		$nbp_journey_time = (isset($_POST['nbp_journey_time']) ? $_POST['nbp_journey_time']: [] );
		$nbp_journey_fare = (isset($_POST['nbp_journey_fare']) ? $_POST['nbp_journey_fare']: [] );
		$nbp_journey_by = (isset($_POST['nbp_journey_by']) ? $_POST['nbp_journey_by']: [] );
		$nbp_distance = (isset($_POST['nbp_distance']) ? $_POST['nbp_distance']: [] );
		$nearby_hotel = (isset($_POST['nearby_hotel']) ? $_POST['nearby_hotel']: [] );
		$nearby_restaurants = (isset($_POST['nearby_restaurants']) ? $_POST['nearby_restaurants']:[] );
		$nearby_tour_place = (isset($_POST['nearby_tour_place']) ? $_POST['nearby_tour_place']:[]);
		$populer_foods = [];
		$tourist_spots = [
			"spots" => ( isset($_POST['spot_all_spot']) ? $_POST['spot_all_spot']: []),
			"journey" => array()
		];
		if(isset($_POST['food_name']) && is_array($_POST['food_name'])){
			foreach ($_POST['food_name'] as $keyFoods => $valueFoods) {
				$populer_foods[] = [
					"name" => $valueFoods,
					"price" => $_POST['food_price'][$keyFoods],
					"details" => $_POST['food_details'][$keyFoods]
				];
			}
		}
		if(is_array($nbp_journey_by)){
			foreach ($nbp_journey_by as $keyJourney => $valueJourney) {
				$tourist_spots['journey'][$keyJourney]['distance'] = $nbp_distance[$keyJourney];
				$tourist_spots['journey'][$keyJourney]['vehicle'] = $valueJourney;
				$tourist_spots['journey'][$keyJourney]['fare'] = $nbp_journey_fare[$keyJourney];
				$tourist_spots['journey'][$keyJourney]['time'] = $nbp_journey_time[$keyJourney];
			}
		}
		if(!empty($name)){
			$data = [
				'name' => $name,
				'details' => $details,
				//'address' => $address,
				'gmap' => $gmap,
				'division' => $division,
				'nearby_hotel' => json_encode($nearby_hotel),
				'nearby_restaurants' => json_encode($nearby_restaurants),
				'nearby_tour_place' => json_encode($nearby_tour_place),
				'populer_foods' => json_encode($populer_foods),
				'tourist_spot' => json_encode($tourist_spots)
			];
			if(isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])){
				$data['thumbnail'] =  uploadImage("image");
			}
			$travelPlace->Update($placeId,$data);
			$message = "Place Updated";
		}else{
			$isError = true;
			$message = "Name Field Required";
		}
	}
	$tourPlace  = new TravelPlace($placeId,$con);
?>
<form action="<?php echo getBaseUrl(); ?>/admin.php?p=edit_tour_place&edit=<?php echo $tourPlace->id; ?>" method="post" enctype="multipart/form-data">
	<div class="row">
		<div class="col-xs-12 col-sm-8">
			<label>Name</label>
			<input class="form-control" name="name" value="<?php echo $tourPlace->name; ?>" type="text">
			<label>Details</label>
			<textarea class="form-control" name="details" rows="10"><?php echo $tourPlace->details; ?></textarea>	
			<div class="popular_foods_section">
				<label>Popular Foods </label>
				<div id="popular_foods_bank">
					<?php
					if(!empty($tourPlace->populer_foods)):
						foreach ($tourPlace->populer_foods as $keyFoods => $valueFoods) {
							?>
							<div class="row">
								<div class="col-xs-12 col-md-4">
									<input class="form-control" name="food_name[]" required value="<?php echo $valueFoods['name']; ?>" placeholder="Food Name" type="text">
								</div>
								<div class="col-xs-12 col-md-4">
									<input class="form-control" name="food_details[]" required value="<?php echo $valueFoods['details']; ?>" placeholder="Details" type="text">
								</div>
								<div class="col-xs-12 col-md-4">
									<input class="form-control col-sm-8" style="float:left;" name="food_price[]" value="<?php echo $valueFoods['price']; ?>" required placeholder="Price" type="text">
									<a href="" style="float: right" class="btn btn-danger rs_remove_food"><i class="fa fa-trash-alt"></i></a>
								</div>
							</div>
							<?php
						}
					endif;
					?>
					
				</div>
				<br>
				<a href="" id="btn_add_foods" class="btn btn-info btn-block"><i class="fa fa-plus-square "></i></a>
			</div>
			
			
			<hr>
			<div class="nearby_tour_place_section">
				<label>Tourist Spots</label>
				<div class="row">
					<div class="col-md-8">
						<input class="form-control" id="make_torist_spt" placeholder="Spot Name" type="text">
					</div>
					<div class="col-md-4">
						<a href="" id="add_new_spot" class="btn btn-info btn-block"><i class="fa fa-plus-square "></i></a>
					</div>
				</div>
				<br>
				<div id="spot_json_data" style="display: none;">
					<?php echo json_encode($tourPlace->tourist_spot); ?>
				</div>
				<div class="all_spot_list edit_form">
					<?php
					if( isset($tourPlace->tourist_spot['spots']) && !empty($tourPlace->tourist_spot['spots'])){
						foreach ($tourPlace->tourist_spot['spots'] as $keySpots => $valueSpots) {
							echo ' <button class="btn btn-info btn-sm" type="button">'.$valueSpots.'</button> <input type="hidden" name="spot_all_spot[]" value="'.$valueSpots.'">';
						}
					}
					?>
				</div>
				<div class="fare_nearby_tp">
					<?php
						if( isset($tourPlace->tourist_spot['spots']) && !empty($tourPlace->tourist_spot['spots'])){
							foreach ($tourPlace->tourist_spot['spots'] as $keySpots => $valueSpots1) {
								foreach ($tourPlace->tourist_spot['spots'] as $keySpotsInner => $valueSpots2) {
									$tempSpotId = $tourPlace->getSpotsId($valueSpots1,$valueSpots2);
									if(isset($tourPlace->tourist_spot['journey'][$tempSpotId])){
										$tempJournyData = $tourPlace->tourist_spot['journey'][$tempSpotId];
										?>
										<div class="single_ntp_group">
										    <h6><?php echo $valueSpots1; ?><strong>To</strong> <?php echo $valueSpots2; ?> <span>OR</span> <?php echo $valueSpots2; ?> <strong>To</strong> <?php echo $valueSpots1; ?> <a data-name="<?php echo $tempSpotId; ?>" href="" style="float: right;" class="btn btn-default btn-sm delete_item_group"><i class="fa fa-trash-alt"></i></a></h6>
										    <input class="form-control" name="nbp_distance[<?php echo $tempSpotId; ?>]" required="" value="<?php echo $tempJournyData['distance']; ?>" placeholder="Distance" type="text">
										    <div class="items">
										    	<?php
										    		foreach ($tempJournyData['vehicle'] as $keyVehicle => $valueVehicle) {
										    			?>
										    			<div class="row">
												            <div class="col-xs-12 col-md-4">
												                <input class="form-control" value="<?php echo $tempJournyData['vehicle'][$keyVehicle]; ?>" name="nbp_journey_by[<?php echo $tempSpotId; ?>][]" required="" placeholder="Vehicle Name" type="text">
												            </div>
												            <div class="col-xs-12 col-md-2">
												                <input class="form-control" value="<?php echo $tempJournyData['fare'][$keyVehicle]; ?>" name="nbp_journey_fare[<?php echo $tempSpotId; ?>][]" required="" placeholder="Fare" type="text">
												            </div>
												            <div class="col-xs-12 col-md-6">
												                <input class="form-control col-sm-8" style="float:left;" value="<?php echo $tempJournyData['time'][$keyVehicle]; ?>" name="nbp_journey_time[<?php echo $tempSpotId; ?>][]" required="" placeholder="Approximate time" type="text"><a href="" style="float: right" class="btn btn-danger delete_item"><i class="fa fa-trash-alt"></i></a></div>
												        </div>
										    			<?php
										    		}
										    	?>
										        
										    </div>
										    <a href="javascript:void(0);" data-name="<?php echo $tempSpotId; ?>" class="btn btn-info btn-block add_new_vehicle"><i class="fa fa-plus-square "></i></a>
										</div>
										<?php
									}
								}
								?>
									
								<?php
							}
						}
					?>
						
				</div>
			</div>
			
		</div>
		<div class="col-xs-12 col-sm-4">
			<!-- <label>address</label>
			<input class="form-control" name="address" type="text"> -->
			<label>Map Location</label>
			<textarea class="form-control" name="gmap" type="text"><?php echo $tourPlace->gmap; ?></textarea>
			<label>Image</label>
			<img src="<?php echo $tourPlace->thumbnail; ?>" style="width:100%;" alt="">
			<input class="form-control" name="image" type="file">
			<label>Division</label>
			<select class="form-control" name="division">
				<?php
					foreach (GetDivision() as $key => $value) {
						if($tourPlace->division == $value){
							echo '<option selected value="'.$value.'">'.$value.'</option>';
						}else{
							echo '<option value="'.$value.'">'.$value.'</option>';
						}
					}
				?>
			</select>
			<label>Nearby Hotel</label>
			<select class="form-control" name="nearby_hotel[]" multiple >
				<?php
					$rsGlobals->dbTable = "hotel";
					$hotels = $rsGlobals->Get();
					while($row = $hotels->fetch_assoc()){
						if(in_array($row['id'],$tourPlace->nearby_hotel)){
							echo '<option selected value="'.$row['id'].'">'.$row['name'].'</option>';
						}else{
							echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
						}
					}
				?>
			</select>
			<label>Nearby Restaurants</label>
			<select class="form-control" name="nearby_restaurants[]" multiple>
				<?php
					while ($row = $allRestaurant->fetch_assoc()) {
						if(in_array($row['id'],$tourPlace->nearby_restaurants)){
							echo '<option selected value="'.$row['id'].'">'.$row['name'].'</option>';
						}else{
							echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
						}
					}
				?>
			</select>
			<label>Nearby Tour Place</label>
			<select class="form-control" name="nearby_tour_place[]" multiple>
				<?php
					while ($row2 =$allTouristPlace->fetch_assoc() ) {
						if(in_array($row2['id'],$tourPlace->nearby_tour_place)){
							echo '<option selected value="'.$row2['id'].'">'.$row2['name'].'</option>';
						}else{
						echo '<option value="'.$row2['id'].'">'.$row2['name'].'</option>';
							
						}
					}
				?>
			</select>
		</div>
	</div>
	<button type="submit"  name="submit" class="btn btn-primary submit mb-4 mt-3">Submit</button>
</form>