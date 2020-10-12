<?php
	$message = "";
	if(isset($_POST['submit'])){
		if($_POST['name'] && $_FILES['image']["tmp_name"]){
			$gallery = new Gallery();
			$imageurl =  uploadImage("image");
			$gallery->name = $_POST["name"];
			$gallery->content = $_POST["details"];
			$gallery->thumbnail = $imageurl;
			$gallery->Create();
			$message = "Gallery Added";
		}else{
			$message = "Please Try Again.";
		}
	}
	if(!empty($message)){
		echo '<p class="alert alert-danger">'.$message.'</p>';
	}	
?>
<form action="<?php echo getBaseUrl(); ?>/admin.php?p=add_gallery" method="post" enctype="multipart/form-data">
	<label>Image Title</label>
	<input class="form-control" name="name" type="text">
	<label>Description</label>
	<textarea class="form-control" name="details" ></textarea>
	<label>Select Image</label>
	<input class="form-control" name="image" type="file">
	<button type="submit"  name="submit" class="btn btn-primary submit mb-4 mt-3">Submit</button>
</form>