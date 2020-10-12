<?php
include('../inc/AutoLoad.php');
global $config;
if(isset($_POST['status']) && $_POST['status'] == "FAILED"){
	$bookingData = new Booking($_POST['value_a']);
	if(!$bookingData->id){
		return;
		exit;
	}
	$bookingData->Delete($bookingData->id);
	header("location: ".getBaseUrl().'/My_account.php?page=package&rsbooktype=fail');
}else{
	echo "Error";
}

