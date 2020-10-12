<?php
include('../inc/AutoLoad.php');
global $config;
if(isset($_POST['status']) && isset($_POST['value_a'])){
	$bookingData = new Booking($_POST['value_a']);
	if(!$bookingData->id){
		return;
		exit;
	}
	$bookingData->Delete($bookingData->id);
	header("location: ".getBaseUrl().'/My_account.php?page=package&rsbooktype=cancel');
}else{
	echo "Error";
}

