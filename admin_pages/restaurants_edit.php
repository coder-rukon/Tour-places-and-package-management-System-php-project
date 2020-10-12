<?php
	$message = "";
	if(!isset($_REQUEST['edit']))
		exit;
	$id = $_REQUEST['edit'];
	$db = new Db();
	$restaurantObj = new RsGlobal($db->con,'restaurant');
	$restaurant = $restaurantObj->Get($id);
	$name = $division = $address = $description = $gmap = $phone = $gmap = $imageurl = "";
	while ($row = $restaurant->fetch_assoc()) {
		$name = $row['name'];
		$division = $row['division'];
		$address = $row['address'];
		$description = $row['description'];
		$gmap = $row['gmap'];
		$phone = $row['phone'];
		$imageurl = $row['thumbnail'];
	}
	if(isset($_POST['submit'])){
		if($_POST['name']){
			
			$name = $_POST['name'];
			$division = $_POST['division'];
			$address = $_POST['address'];
			$description = $_POST['description'];
			$gmap = $_POST['gmap'];
			$phone = $_POST['phone'];
			if(isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])){
				$imageurl =  uploadImage("image");
			}
			$restaurantObj->Update($id,[
				"name" => $name,
				"division" => $division,
				"thumbnail" => $imageurl,
				"address" => $address,
				"description" => $description,
				"gmap" => $gmap,
				"phone" => $phone,
			]);
			$message = "Restaurant Updated";
		}else{
			$message = "Name is rquired!";
		}
	}
	if(!empty($message)){
		echo '<p class="alert alert-danger">'.$message.'</p>';
	}
?>
<form action="<?php echo getBaseUrl(); ?>/admin.php?p=restaurants_edit&edit=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
	<div class="row">
		<div class="col-xs-12 col-sm-8">
			<label>Restaurant Name</label>
			<input class="form-control" value="<?php echo $name; ?>" name="name" type="text">
			<label>Restaurant Details</label>
			<textarea class="form-control" name="description" rows="10"><?php echo $description; ?></textarea>	
		</div>
		<div class="col-xs-12 col-sm-4">
			<label>Restaurant address</label>
			<input class="form-control" name="address" value="<?php echo $address; ?>"  type="text">
			<label>Restaurant Map Location</label>
			<textarea class="form-control" name="gmap"  type="text"><?php echo $gmap; ?></textarea>
			<label>Restaurant Phone</label>
			<input class="form-control" name="phone" value="<?php echo $phone; ?>"  type="text">
			<label>Restaurant Image</label>
			<img src="<?php echo $imageurl; ?>" style="max-width: 100%; margin-bottom: 15px;" alt="">
			<input class="form-control" name="image" type="file">
			<label>Division</label>
			<select class="form-control" name="division">
				<?php
					foreach (GetDivision() as $key => $value) {
						echo '<option '.($division == $value ? "selected": "").' value="'.$value.'">'.$value.'</option>';
					}
				?>
			</select>
		</div>
	</div>
	
	
	<button type="submit"  name="submit" class="btn btn-primary submit mb-4 mt-3">Submit</button>
</form>