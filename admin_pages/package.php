<?php
	$title = "All Packages";
	$data = array();
	
	$package = new Package();
	if(isset($_GET['delete'])){
		$package->delete($_GET['delete']);
	}
	$package = $package->Get();
	$db = new Db();
	$fromPlace = new RsGlobal($db->con,'place');
	$toTravel = new RsGlobal($db->con,'travel_place');
	while($row = $package->fetch_assoc()){
		$name = $row['name'];
		$fromName = "From Name";
		$toName = "To Name";
		$tempToObj = $toTravel->Get($row['resort_to']);
		$tempFromObj = $fromPlace->Get($row['place_from']);
		$tempNameFrom = "";
		$tempNameTo = "";
		$daysTemp = $row['days'];
		$fromId = 0;
		$toId = 0;
		while ($tempRowFrom = $tempFromObj->fetch_assoc()) {
			$tempNameFrom = $tempRowFrom['name'];
			$fromId = $tempRowFrom['id'];
		}
		while ($tempRowTo = $tempToObj->fetch_assoc()) {
			$tempNameTo = $tempRowTo['name'];
			$toId = $tempRowTo['id'];
		}
		$data[] = new DataList( $name ,null,"package-details.php?package=".$row["id"],"admin.php?p=package_edit&id=".$row["id"],"admin.php?p=package&delete=".$row["id"]);
	}
	include("data_list.php");
?>