<?php
	$message = "";
	$packageObj = new Package();
	$db = new Db();
	$fromPlace = new RsGlobal($db->con,'place');
	$toTravel = new RsGlobal($db->con,'travel_place');
	if(isset($_POST['name'])){
		if($_POST['name']){
			$data['name'] = $_POST['name'];
			$data['place_from'] = $_POST['place_from'];
			$data['resort_to'] = $_POST['resort_to'];
			$data['days'] = $_POST['days'];
			$data['type'] = $_POST['type'];
			$data['details'] = $_POST['details'];
			$data['image'] = $_POST['image'];
			$data['total_seat'] = $_POST['total_seat'];
			$data['price'] = $_POST['price'];
			$data['date'] = $_POST['date'];
			$data['status'] = $_POST['status'];
			$packageObj->addPackage($data);
			
			$message = "New Packge created";
		}else{
			$message = "Name is rquired!";
		}
	}
	if(!empty($message)){
		echo '<p class="alert alert-danger">'.$message.'</p>';
	}
?>
<form action="<?php echo getBaseUrl(); ?>/admin.php?p=package_add" method="post">
	<label>Name</label>
	<input class="form-control" name="name" type="text">
	<label>Days</label>
	<input class="form-control" name="days" type="text">
	<label>From</label>
	<select class="form-control" name="place_from">
		<?php
			$allPlaces = $fromPlace->Get();
			while ($row = $allPlaces->fetch_assoc()) {
				echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
			}
		?>
	</select>
	<label>To</label>
	<select class="form-control" name="resort_to">
		<?php
			$touristPlace = $toTravel->Get();
			while ($row = $touristPlace->fetch_assoc()) {
				echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
			}
		?>
	</select>
	<label>Type</label>
	<select class="form-control" name="type">
		<option value="single">Single</option>
		<option value="couple">Couple</option>
	</select>
	
	<label>Image</label>
	<input class="form-control" name="image" type="text">
	<label>Details</label>
	<textarea class="form-control" name="details"></textarea>
	<label>Total Seat</label>
	<input class="form-control" name="total_seat" type="number">
	<label>Date</label>
	<input class="form-control" name="date" type="date" placeholder="Day/Month/Year">
	<label>Price</label>
	<input class="form-control" name="price" type="number">
	<label>Status</label>
	<select class="form-control" name="status">
		<option value="expired">Expired</option>
		<option value="ongoing">Ongoing</option>
		<option value="boocked">Bookced</option>
	</select>
	<button type="submit"  name="submit" class="btn btn-primary submit mb-4 mt-3">Submit</button>
</form>