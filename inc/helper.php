<?php
$config = [
	"payment" => [
		"store_id" => "",
		"store_passwd" => "",
		"api_url" => "https://sandbox.sslcommerz.com/gwprocess/v4/api.php",
	]
];
function GetDivision(){
 	$divistion = [
		"Barishal",
		"Chattagram",
		"Dhaka",
		"Khulna",
		"Mymensingh",
		"Rajshahi",
		"Sylhet",
		"Rangpur"
	];
 	return $divistion;
}
function getMenuClass($menuName,$cmpWith){
	$allMenuNames = explode(',',$menuName);
	return ( in_array($cmpWith,$allMenuNames) ? "active": "");
}
function isLogin(){
	if(isset($_SESSION['is_login']) && $_SESSION['is_login']){
		return true;
	}
	return false;
}
function beforLoad($action){
	$action();
}
function uploadImage($imageName){
	$baseDir = "upload";
	$url = "";
	if(isset($_FILES[$imageName])){
		$date = date("Y/m/d");
		$fileDir = $baseDir.'/'.$date;
		if(!file_exists($fileDir))
			mkdir($fileDir,0777,true);
		$newFileUrl = $fileDir.'/'.uniqid()."_".$_FILES[$imageName]["name"];
		move_uploaded_file($_FILES[$imageName]["tmp_name"], $newFileUrl);
		$url = $newFileUrl;
	}
	
	return $url;
}

function getBaseUrl(){
	return 'http://localhost/tourist_guide';
}


