<?php
	$message = "";
    $id = $_GET['id'];
    if(!$id){
        return;
    }
    $packageObj = new Package($id);
    if(!$packageObj ){
        return;
    }
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
			$packageObj->update($id,$data);
			
			$message = "Updated";
		}else{
			$message = "Name is rquired!";
		}
	}
	if(!empty($message)){
		echo '<p class="alert alert-danger">'.$message.'</p>';
	}
	$packageObj = new Package($id);
?>
<form action="<?php echo getBaseUrl(); ?>/admin.php?p=package_edit&id=<?php echo $id; ?>" method="post">
	<label>Name</label>
	<input class="form-control" name="name" type="text" value="<?php echo $packageObj->name; ?>">
	<label>Days</label>
	<input class="form-control" name="days" type="text" value="<?php echo $packageObj->days; ?>">
	<label>From</label>
	<select class="form-control" name="place_from" value="<?php echo $packageObj->place_from; ?>">
		<?php
			$allPlaces = $fromPlace->Get();
			while ($row = $allPlaces->fetch_assoc()) {
				echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
			}
		?>
	</select>
	<label>To</label>
	<select class="form-control" name="resort_to"  value="<?php echo $packageObj->resort_to; ?>">
		<?php
			$touristPlace = $toTravel->Get();
			while ($row = $touristPlace->fetch_assoc()) {
				echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
			}
		?>
	</select>
	<label>Type</label>
	<select class="form-control" name="type" value="<?php echo $packageObj->type; ?>">
		<option value="single"   <?php echo ($packageObj->type =="single" ? "selected" : ""); ?> >Single</option>
		<option value="couple"   <?php echo ($packageObj->type =="couple" ? "selected" : ""); ?> >Couple</option>
	</select>
	
	<label>Image</label>
	<input class="form-control" name="image" type="text"  value="<?php echo $packageObj->image; ?>">
	<label>Details</label>
	<textarea class="form-control" name="details"><?php echo $packageObj->details; ?></textarea>
	<label>Total Seat</label>
	<input class="form-control" name="total_seat" type="number"  value="<?php echo $packageObj->total_seat; ?>">
	<label>Date</label>
	<input class="form-control" name="date" type="date" placeholder="Day/Month/Year"  value="<?php echo $packageObj->date; ?>">
    <label>Price</label>
	<input class="form-control" name="price" type="number" value="<?php echo $packageObj->price; ?>">
	<label>Status</label>
	<select class="form-control" name="status">
		<option value="expired" <?php echo ($packageObj->status =="expired" ? "selected" : ""); ?> >Expired</option>
		<option value="ongoing"  <?php echo ($packageObj->status =="ongoing" ? "selected" : ""); ?> >Ongoing</option>
		<option value="boocked"  <?php echo ($packageObj->status =="boocked" ? "selected" : ""); ?> >Bookced</option>
	</select>
	<button type="submit"  name="submit" class="btn btn-primary submit mb-4 mt-3">Submit</button>
</form>