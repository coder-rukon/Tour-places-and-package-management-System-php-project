<?php

	$title = "All Place";

	$data = array();

	$db = new Db();

	$place = new RsGlobal($db->con,'place');

	if(isset($_GET['delete'])){

		$place->Delete($_GET['delete']);

	}

	$dataObj = $place->Get();

	while($row = $dataObj->fetch_assoc()){

		$data[] = new DataList($row["name"],null,null,null,getBaseUrl()."/admin.php?p=place&delete=".$row["id"]);

	}

	include("data_list.php");

?>