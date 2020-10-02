<?php
	$message = "";
	if(isset($_POST['submit'])){
		if($_POST['name']){
			$db = new Db();

			$place = new RsGlobal($db->con,'place');
			$name = $_POST['name'];
			$division = $_POST['division'];
			$place->Insert([
				"name" => $name,
				"division" => $division
			]);
			$message = "New Place Added";
		}else{
			$message = "Name is rquired!";
		}
	}
	if(!empty($message)){
		echo '<p class="alert alert-danger">'.$message.'</p>';
	}
?>

<form action="" method="post">
	<label>Place Name</label>
	<input class="form-control" name="name" type="text">
	<label>Division</label>
	<select class="form-control" name="division">
		<?php
			foreach (GetDivision() as $key => $value) {
				echo '<option value="'.$value.'">'.$value.'</option>';
			}
		?>
	</select>
	<button type="submit"  name="submit" class="btn btn-primary submit mb-4 mt-3">Submit</button>
</form>