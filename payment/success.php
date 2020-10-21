<?php 
include('../inc/AutoLoad.php');
global $config;
if(isset($_POST['status']) && $_POST['status'] == "VALID"){
	$bookingData = new Booking($_POST['value_a']);
	if(!$bookingData->id){
		return;
		exit;
	}
	$customer = new Users($bookingData->user_id);
	$result=$bookingData->Update($_POST['value_a'],[
		'val_id' => $_POST['val_id'],
		'bank_tran_id' => $_POST['bank_tran_id'],
		'payment_id' => $_POST['tran_id'],
		'payment_method' => $_POST['card_type'],
		'status' => "confirmed"
		]);
	$package = new Package($bookingData->package_id);
	if($package->total_seat <= $package->getBookedSeatNumber()){
		$package->setBooked();
	}

	header("location: ".getBaseUrl().'/My_account.php?page=package&rsbooktype=success');
}else{
	echo "Payment Fail";
}



//header("location:".getBaseUrl().m)
?>