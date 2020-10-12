<?php
	$message = "";
	if(isset($_POST['submit'])){
		if($_POST['name']){
			$db = new Db();
			$restaurant = new RsGlobal($db->con,'restaurant');
			$name = $_POST['name'];
			$division = $_POST['division'];
			$address = $_POST['address'];
			$description = $_POST['description'];
			$gmap = $_POST['gmap'];
			$phone = $_POST['phone'];
			$imageurl =  uploadImage("image");
			$restaurant->Insert([
				"name" => $name,
				"division" => $division,
				"thumbnail" => $imageurl,
				"address" => $address,
				"description" => $description,
				"gmap" => $gmap,
				"phone" => $phone,
			]);
			$message = "New restaurant Added";
		}else{
			$message = "Name is rquired!";
		}
	}
	if(!empty($message)){
		echo '<p class="alert alert-danger">'.$message.'</p>';
	}
?>
<form action="<?php echo getBaseUrl(); ?>/admin.php?p=restaurants_create" method="post" enctype="multipart/form-data">
	<div class="row">
		<div class="col-xs-12 col-sm-8">
			<label>Restaurant Name</label>
			<input class="form-control" name="name" type="text">
			<label>Restaurant Details</label>
			<textarea class="form-control" name="description" rows="10"></textarea>	
		</div>
		<div class="col-xs-12 col-sm-4">
			<label>Restaurant address</label>
			<input class="form-control" name="address" type="text">
			<label>Restaurant Map Location</label>
			<input class="form-control" name="gmap" type="text">
			<label>Restaurant Phone</label>
			<input class="form-control" name="phone" type="text">
			<label>Restaurant Image</label>
			<input class="form-control" name="image" type="file">
			<label>Division</label>
			<select class="form-control" name="division">
				<?php
					foreach (GetDivision() as $key => $value) {
						echo '<option value="'.$value.'">'.$value.'</option>';
					}
				?>
			</select>
		</div>
	</div>
	
	
	<button type="submit"  name="submit" class="btn btn-primary submit mb-4 mt-3">Submit</button>
</form>