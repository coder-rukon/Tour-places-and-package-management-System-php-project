<?php
	$title = "Gallery List";
	$data = array();
	
	$gallery = new Gallery();
	if(isset($_GET['delete'])){
		$gallery->delete($_GET['delete']);
	}
	$galleryData = $gallery->Get();
	while($row = $galleryData->fetch_assoc()){
		$data[] = new DataList($row["name"],$row["thumbnail"],'Gallery-details.php?p='.$row["id"],null,"admin.php?p=gallery&delete=".$row["id"]);
	}
	include("data_list.php");
?>