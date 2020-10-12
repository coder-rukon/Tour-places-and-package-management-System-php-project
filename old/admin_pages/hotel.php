<?php
$title = "Hotel List";
$data = array();
$db = new Db();
$hotel = new RsGlobal($db->con,'hotel');
if(isset($_GET['delete'])){
	$hotel->delete($_GET['delete']);
}
$galleryData = $hotel->Get();
while($row = $galleryData->fetch_assoc()){
	$data[] = new DataList($row["name"],$row["thumbnail"],'Hotel-details.php?p='.$row["id"],"admin.php?p=hotel_form&edit=".$row["id"],"admin.php?p=hotel&delete=".$row["id"]);
}
include("data_list.php");