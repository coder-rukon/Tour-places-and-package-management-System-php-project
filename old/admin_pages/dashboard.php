<?php
$title = "Tour/Travel Places";
$data = array();
$db = new Db();
$hotel = new RsGlobal($db->con,'travel_place');
if(isset($_GET['delete'])){
	$hotel->delete($_GET['delete']);
}
$galleryData = $hotel->Get();
while($row = $galleryData->fetch_assoc()){
	$data[] = new DataList($row["name"],$row["thumbnail"],'Place-details.php?p='.$row["id"],"admin.php?p=edit_tour_place&edit=".$row["id"],"admin.php?p=dashboard&delete=".$row["id"]);
}
include("data_list.php");