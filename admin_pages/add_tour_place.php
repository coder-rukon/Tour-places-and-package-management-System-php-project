<?php
	$con = new Db();
	$rsGlobals = new RsGlobal($con->con,"restaurant");
	$allRestaurant = $rsGlobals->get();
	
	$travelPlace = new TravelPlace(null ,$con);
	$allTouristPlace = $travelPlace->get();
	$message= "";
	$isError= false;
	if(isset($_POST['submit'])){
		$name = $_POST['name'];
		$thumbnail = uploadImage('image');
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
				'thumbnail' => $thumbnail,
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
			$travelPlace->insert($data);
			$message = "Place created";
		}else{
			$isError = true;
			$message = "Name Field Required";
		}
	}
?>
<form action="<?php echo getBaseUrl(); ?>/admin.php?p=add_tour_place" method="post" enctype="multipart/form-data">
	<div class="row">
		<div class="col-xs-12 col-sm-8">
			<label>Name</label>
			<input class="form-control" name="name" type="text">
			<label>Details</label>
			<textarea class="form-control" name="details" rows="10"></textarea>	
			<div class="popular_foods_section">
				<label>Popular Foods </label>
				<div id="popular_foods_bank">
					<div class="row">
						<div class="col-xs-12 col-md-4">
							<input class="form-control" name="food_name[]" required placeholder="Food Name" type="text">
						</div>
						<div class="col-xs-12 col-md-4">
							<input class="form-control" name="food_details[]" required placeholder="Details" type="text">
						</div>
						<div class="col-xs-12 col-md-4">
							<input class="form-control col-sm-8" style="float:left;" name="food_price[]" required placeholder="Price" type="text">
							<a href="" style="float: right" class="btn btn-danger rs_remove_food"><i class="fa fa-trash-alt"></i></a>
						</div>
					</div>
				</div>
				<br>
				<a href="" id="btn_add_foods" class="btn btn-info btn-block"><i class="fa fa-plus-square "></i></a>
			</div>
			
			
			<hr>
			<div class="nearby_tour_place_section">
				<label>Tourist Spots</label>
				<div class="row">
					<div class="col-md-8">
						<input class="form-control" id="make_torist_spt" required placeholder="Spot Name" type="text">
					</div>
					<div class="col-md-4">
						<a href="" id="add_new_spot" class="btn btn-info btn-block"><i class="fa fa-plus-square "></i></a>
					</div>
				</div>
				<br>
				<div class="all_spot_list">
					
				</div>
				<div class="fare_nearby_tp">
					
				</div>
			</div>
			
		</div>
		<div class="col-xs-12 col-sm-4">
			<!-- <label>address</label>
			<input class="form-control" name="address" type="text"> -->
			<label>Map Location</label>
			<input class="form-control" name="gmap" type="text">
			<label>Image</label>
			<input class="form-control" name="image" type="file">
			<label>Division</label>
			<select class="form-control" name="division">
				<?php
					foreach (GetDivision() as $key => $value) {
						echo '<option value="'.$value.'">'.$value.'</option>';
					}
				?>
			</select>
			<label>Nearby Hotel</label>
			<select class="form-control" name="nearby_hotel[]" multiple >
				<?php
					$rsGlobals->dbTable = "hotel";
					$hotels = $rsGlobals->Get();
					while($row = $hotels->fetch_assoc()){
						echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
					}
				?>
			</select>
			<label>Nearby Restaurants</label>
			<select class="form-control" name="nearby_restaurants[]" multiple>
				<?php
					while ($row = $allRestaurant->fetch_assoc()) {
						echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
					}
				?>
			</select>
			<label>Nearby Tour Place</label>
			<select class="form-control" name="nearby_tour_place[]" multiple>
				<?php
					while ($row2 =$allTouristPlace->fetch_assoc() ) {
						echo '<option value="'.$row2['id'].'">'.$row2['name'].'</option>';
					}
				?>
			</select>
		</div>
	</div>
	<button type="submit"  name="submit" class="btn btn-primary submit mb-4 mt-3">Submit</button>
</form>