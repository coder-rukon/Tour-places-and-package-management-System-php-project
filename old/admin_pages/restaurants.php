<?php
	$title = "Restaurants List";
	$data = array();
	$db = new Db();
	$restaurant = new RsGlobal($db->con,'restaurant');
	if(isset($_GET['delete'])){
		$restaurant->delete($_GET['delete']);
	}
	$galleryData = $restaurant->Get();
	while($row = $galleryData->fetch_assoc()){
		$data[] = new DataList($row["name"],$row["thumbnail"],'restaurant-details.php?p='.$row["id"],"admin.php?p=restaurants_edit&edit=".$row["id"],"admin.php?p=restaurants&delete=".$row["id"]);
	}
	include("data_list.php");
?>