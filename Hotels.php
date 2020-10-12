<?php
$menu = "hotel";
if(isset($_GET['s']) AND $_GET['s'] == "offer")
	$menu = "offers";
	$page_title = "Hotels";
	include("header.php");
?>
<!--/process-->
	<section class="banner-rs-bottom py-lg-5 py-3" id="plats">
		<div class="container py-lg-4 py-3">
			<div class="row inner-sec-agileits-w3ls">
				<div class="row t-in" style="width: 100%;">
					<?php
					$db = new DB();
					$rsGlobal = new RsGlobal($db->con,"hotel");
					if(isset($_GET['s'])){
						$allHotels = $rsGlobal->Query("SELECT * FROM hotel WHERE offer != ''");
					}
					else{
						$allHotels = $rsGlobal->Query("SELECT * FROM hotel");
					}
					while ($row = $allHotels->fetch_assoc()) {
						$hotel = $row;
						include('inc/template/hotel_loop.php');
					}
					?>
				</div>
			</div>
		</div>
	</section>
	<!--//preocess-->
<?php
	include("footer.php");
?>