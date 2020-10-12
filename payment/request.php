<?php
/* PHP */
include('../inc/AutoLoad.php');
global $config;
$bookingData = new Booking($_GET['booking_id']);
if(!$bookingData->id){
	return;
	exit;
}

$customer = new Users($bookingData->user_id);

$post_data = array();
$post_data['store_id'] = $config['payment']['store_id'];
$post_data['store_passwd'] = $config['payment']['store_passwd'];
$post_data['total_amount'] = $bookingData->total;
$post_data['currency'] = "BDT";
$post_data['tran_id'] = "SSLCZ_".uniqid();
$post_data['success_url'] = getBaseUrl()."/payment/success.php";
$post_data['fail_url'] = getBaseUrl()."/payment/fail.php";
$post_data['cancel_url'] = getBaseUrl()."/payment/cancel.php";
//Product info
$post_data['product_name'] = "Test Product";
$post_data['product_category'] = "Packge_reservation";
$post_data['product_profile'] = "general";
# EMI INFO
$post_data['emi_option'] = "0";
$post_data['shipping_method'] = "NO";
# CUSTOMER INFORMATION
$post_data['cus_name'] = $customer->name;
$post_data['cus_email'] = $customer->email;
$post_data['cus_add1'] = "Dhaka";
$post_data['cus_add2'] = "Dhaka";
$post_data['cus_city'] = "Dhaka";
$post_data['cus_state'] = "Dhaka";
$post_data['cus_postcode'] = "1000";
$post_data['cus_country'] = "Bangladesh";
$post_data['cus_phone'] = "01711111111";
$post_data['cus_fax'] = "01711111111";


# OPTIONAL PARAMETERS
$post_data['value_a'] = $bookingData->id;

$direct_api_url = $config['payment']['api_url'];

$handle = curl_init();
curl_setopt($handle, CURLOPT_URL, $direct_api_url );
curl_setopt($handle, CURLOPT_TIMEOUT, 30);
curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($handle, CURLOPT_POST, 1 );
curl_setopt($handle, CURLOPT_POSTFIELDS, $post_data);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, FALSE); # KEEP IT FALSE IF YOU RUN FROM LOCAL PC


$content = curl_exec($handle );

$code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

if($code == 200 && !( curl_errno($handle))) {
	curl_close( $handle);
	$sslcommerzResponse = $content;
} else {
	curl_close( $handle);
	echo "FAILED TO CONNECT WITH SSLCOMMERZ API";
	exit;
}

$sslcz = json_decode($sslcommerzResponse, true );
if(isset($sslcz['GatewayPageURL']) && $sslcz['GatewayPageURL']!="" ) {
	header("Location: ". $sslcz['GatewayPageURL']);
	exit;
} else {
	echo "JSON Data parsing error!";
}