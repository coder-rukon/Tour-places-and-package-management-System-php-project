<?php
	$page = (isset($_GET['p']) ? $_GET['p']: "dashboard");
	include("header.php");
	if(isset($_SESSION['is_login']) && $_SESSION['is_login'] && $_SESSION['user']['role'] == "admin"){
		if(file_exists('admin_pages/'.$page.'.php')){
			include('admin_pages/master.php');
		}else{
			include('404.php');
		}
	}else{
		
			include('404.php');
	}
	
	include("footer.php");
?>