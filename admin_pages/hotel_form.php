<?php
	$message = "";
	$db = new Db();
	$hotel = new RsGlobal($db->con,'hotel');
	$travelObj = new TravelPlace();
	$TravelPlaces = $travelObj->Get();
	$name = "";
	$division = "";
	$address = "";
	$description = "";
	$gmap = "";
	$phone = "";
	$imageurl = "";
	$budget_min = "";
	$budget_max = "";
	$offer = "";
	$nearbyTravelPlace = [];
	$facility = [];
	if(isset($_GET['edit'])){
		$hotelId = $_GET['edit'];
		$hotelOld = $hotel->Get($hotelId);
		while ($row = $hotelOld->fetch_assoc()) {
			$name = $row['name'];
			$division = $row['division'];
			$address = $row['address'];
			$gmap = $row['gmap'];
			$description = $row['description'];
			$phone = $row['phone'];
			$budget_min = $row['budget_min'];
			$budget_max = $row['budget_max'];
			$offer = $row['offer'];
			$imageurl = $row['thumbnail'];
			$nearbyTravelPlace = json_decode( $row['nearby_travel_place'],true);
			$facility = json_decode( $row['facility'],true);
		}
	}
	if(isset($_POST['submit'])){
		if($_POST['name']){
			$name = $_POST['name'];
			$division = $_POST['division'];
			$address = $_POST['address'];
			$description = $_POST['description'];
			$gmap = $_POST['gmap'];
			$phone = $_POST['phone'];
			$budget_max = $_POST['budget_max'];
			$budget_min = $_POST['budget_min'];
			$offer = $_POST['offer'];
			$nearbyTravelPlace = (isset($_POST['nearby_travel_place']) ? $_POST['nearby_travel_place']:[]);
			$facility = [];
			if(isset($_POST['facility_name'])){
				foreach ($_POST['facility_name'] as $keyFacility => $valueFacility) {
					$facility[] = [
						"name" => $valueFacility,
						"description" => $_POST['facility_details'][$keyFacility],
					];
				}
			}
			$data = [
				"name" => $name,
				"division" => $division,
				"address" => $address,
				"description" => $description,
				"gmap" => $gmap,
				"phone" => $phone,
				"offer" => $offer,
				"budget_max" => $budget_max,
				"budget_min" => $budget_min,
				"facility" => json_encode($facility),
				"nearby_travel_place" => json_encode($nearbyTravelPlace),
			];
			if(isset($_FILES['image']['tmp_name']) && !empty($_FILES['image']['tmp_name'])){
				$imageurl =  uploadImage("image");
				$data['thumbnail'] = $imageurl;
			}
			if(isset($hotelId)){
				$hotel->Update($hotelId,$data);
				$message = "Hotel Updated";
			}else{
				$outout = $hotel->Insert($data);
				var_dump($outout );
				echo "<br/>";
				echo "<pre>";
				print_r($hotel);
				echo "</pre>";
				$message = "New hotel Added";
			}
		}else{
			$message = "Name is rquired!";
		}
	}
	if(!empty($message)){
		echo '<p class="alert alert-danger">'.$message.'</p>';
	}
?>
<form action="<?php echo getBaseUrl(); ?>/admin.php?p=hotel_form" method="post" enctype="multipart/form-data">
	<div class="row">
		<div class="col-xs-12 col-sm-8">
			<label>Hotel Name</label>
			<input class="form-control" name="name" value="<?php echo $name; ?>" type="text">
			<label>Hotel Details</label>
			<textarea class="form-control" name="description" rows="10"><?php echo $description; ?></textarea>
			<div class="popular_foods_section">
				<label>Hotel Facility </label>
				<div id="facility_bank">
					<?php
						foreach ($facility as $keyFacility => $valueFacility) {
							?>
							<div class="row mb-2">
								<div class="col-xs-12 col-md-5">
									<input class="form-control" name="facility_name[]" value="<?php echo $valueFacility['name']; ?>" required placeholder="Title" type="text">
								</div>
								<div class="col-xs-12 col-md-7">
									<a href="" style="float: right" class="btn btn-danger   rs_remove_food"><i class="fa fa-trash-alt"></i></a>
									<input class="form-control form-control col-md-10" name="facility_details[]"  value="<?php echo $valueFacility['description']; ?>"  required placeholder="Details" type="text">
								</div>
							</div>
							<?php
						}
					?>
					
				</div>
				<br>
				<a href="" id="btn_add_facility" class="btn btn-info btn-block"><i class="fa fa-plus-square "></i></a>
			</div>
		</div>
		<div class="col-xs-12 col-sm-4">
			<label>Hotel address</label>
			<input class="form-control" name="address" value="<?php echo $address; ?>" type="text">
			<label>Hotel Map Location</label>
			<textarea class="form-control" name="gmap"><?php echo $gmap; ?></textarea>
			
			<label>Hotel Phone</label>
			<input class="form-control" name="phone" type="text" value="<?php echo $phone; ?>">
			
			<label>Budget Range</label>
			<div class="row">
				<div class="col-xs-4 col-sm-5">
					<input class="form-control" placeholder="Min" name="budget_min" type="text" value="<?php echo $budget_min; ?>">
				</div>
				<div class="col-xs-4 col-sm-2">
					<h2>To</h2>
				</div>
				<div class="col-xs-4 col-sm-5">
					<input class="form-control" placeholder="Max"  name="budget_max" type="text" value="<?php echo $budget_max; ?>">
				</div>
			</div>
			
			<label>Offer</label>
			<input class="form-control" name="offer" type="text" value="<?php echo $offer; ?>">
			
			<label>Hotel Image</label>
			<?php
				if(isset($hotelId)){
					echo '<img src="'.$imageurl.'" style="max-width:100%;" alt="">';
				}
			?>
			<input class="form-control" name="image" type="file">
			<label>Division</label>
			<select class="form-control" name="division">
				<?php
					foreach (GetDivision() as $key => $value) {
						if($division == $value){
							echo '<option selected value="'.$value.'">'.$value.'</option>';
						}else{
							echo '<option value="'.$value.'">'.$value.'</option>';
						}
					}
				?>
			</select>
			<label>Nearby Travel Place</label>
			<select class="form-control" name="nearby_travel_place[]" multiple>
				<?php
					while ($valuePlace = $TravelPlaces->fetch_assoc()) {
						if(in_array($valuePlace['id'],$nearbyTravelPlace)){
							echo '<option selected value="'.$valuePlace['id'].'">'.$valuePlace['name'].'</option>';
						}else{
							echo '<option value="'.$valuePlace['id'].'">'.$valuePlace['name'].'</option>';
						}
					}
				?>
			</select>
		</div>
	</div>
	
	
	<button type="submit"  name="submit" class="btn btn-primary submit mb-4 mt-3">Submit</button>
</form>