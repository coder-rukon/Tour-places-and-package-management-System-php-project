<?php
if(!isset($menu)){
	$menu = "home";
}
	include('inc/AutoLoad.php');
	if(!isset($is_package_form))
		$is_package_form = false;
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Pack & GO</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);
		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
	<link rel="stylesheet" href="css/contact.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/owl.carousel.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/owl.theme.css" type="text/css" media="all">
	<link href="css/fontawesome-all.css" rel="stylesheet">
	<link rel="stylesheet" href="css/single.css" type="text/css" media="screen" property="" />
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href="//fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
</head>
<body>
	<div class="banner-rs">
		<header>
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<a class="navbar-brand" href="index.php">Pack & Go</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
				    aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="fas fa-bars"></i>
					</span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto main_menu">
						<li class="nav-item <?php echo getMenuClass($menu,"home"); ?>  ">
							<a class="nav-link" href="index.php">Home
								<span class="sr-only">(current)</span>
							</a>
						</li>
						<li class="nav-item <?php echo getMenuClass($menu,"place"); ?> ">
							<a class="nav-link" href="Places.php">
								Places
								<i class="fas fa-caret-down"></i>
							</a>
							<ul>
								<?php
									foreach (GetDivision() as $keyDivision => $valueDivision){
										echo "<li>";
										echo '<a class="dropdown-item" href="Places.php?division='.$valueDivision.'">'.$valueDivision.'</a>';
										echo "</li>";
									}
								?>
							</ul>
						</li>
						<li class="nav-item <?php echo getMenuClass($menu,"gallery"); ?>  ml-xl-2">
							<a class="nav-link" href="Gallery.php">Gallery</a>
						</li>
						<li class="nav-item <?php echo getMenuClass($menu,"package"); ?>  ml-xl-2">
							<a class="nav-link" href="Package.php">Packges</a>
						</li>
						
						<li class="nav-item <?php echo getMenuClass($menu,"offers"); ?>  ml-xl-2">
							<a class="nav-link" href="Hotels.php">Hotel<i class="fas fa-caret-down"></i></a>
							<ul>
								<li><a class="nav-link" href="Hotels.php">All Hotel</a></li>
								<li><a class="nav-link" href="Hotels.php?s=offer">Offers</a></li>
							</ul>

						</li>
						<li class="nav-item <?php echo getMenuClass($menu,"team"); ?>  ml-xl-2">
							<a class="nav-link" href="Team.php">Our Team</a>
						</li>
						<li class="nav-item <?php echo getMenuClass($menu,"contact"); ?>  ml-xl-2">
							<a class="nav-link" href="Contact.php">Contact Us</a>
						</li>
						<li class="nav-item <?php echo getMenuClass($menu,"account"); ?>  dropdown ml-xl-2">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
							    aria-expanded="false">
								My Account
								<i class="fas fa-caret-down"></i>
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<?php
									if(isLogin()):
								?>
								<a class="dropdown-item" href="<?php echo ($_SESSION['user']['role'] == 'admin' ? 'admin.php' : "My_account.php"); ?>">Dashboard</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="Login.php">Logout</a>
								<?php
									else:
								?>
								<a class="dropdown-item" href="Register.php">Register</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="Login.php">Login</a>
								<?php endif; ?>
							</div>
						</li>
						<li class="nav-item menu_serch <?php echo getMenuClass($menu,"home"); ?>  ml-xl-2">
							<a class="nav-link  dropdown-toggle" href="" id="navbarDropdownSearch" role="button" data-toggle="dropdown" aria-haspopup="true"
							    aria-expanded="false">
								<i class="fas fa-search"></i>
								
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownSearch">
								<form style="" action="Places.php" method="get">
									<input type="text" class="form-control" name="s" placeholder="Type here.">
									<div class="dropdown-divider"></div>
									<button type="submit" class="btn btn-info">Search</button>
								</form>
							</div>
						</li>
					</ul>
				</div>
			</nav>
		</header>
		<!--banner-rs-->
		<?php
			if($is_package_form){
				include('inc/template/package_search_form.php');
			}else if(isset($page_title)){
				?>
				<div class="banner-rs-info rs_page_main_title">
							<!--/search_form -->
					<div id="search_form" class="search_top text-center">
						
						<h3><?php echo $page_title; ?></h3>
					</div>
					<!--//search_form -->
				</div>
				<?php
			}
		?>
		<!--//banner-rs-->
	</div>
	