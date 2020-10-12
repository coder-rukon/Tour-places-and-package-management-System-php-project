<?php
$title = "All User List";
$data = array();
$db = new Db();
$hotel = new RsGlobal($db->con,'users');
if(isset($_GET['delete'])){
	$hotel->delete($_GET['delete']);
}
$galleryData = $hotel->Get();
while($row = $galleryData->fetch_assoc()){
	$data[] = new DataList($row["name"],null,null,null,"admin.php?p=users&delete=".$row["id"]);
}
include("data_list.php");