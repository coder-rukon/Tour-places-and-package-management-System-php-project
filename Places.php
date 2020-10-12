<?php
$menu = "place";
$page_title = "Travel Places";
include("header.php");
$travelObj = new TravelPlace();
$allTravelPlace = $travelObj->Get();
$isPlaceFound = false;
?>
<!--/process-->
	<section class="banner-rs-bottom py-lg-5 py-3" id="plats">
		<div class="container py-lg-4 py-3">
			<?php if(isset($_GET['division'])): ?>
			<h3 class="tittle text-center mb-lg-5 mb-3">Places are at <?php echo $_GET['division'];?></h3>
			<?php endif; ?>
			<?php if(isset($_GET['s'])): ?>
			<h3 class="tittle text-center mb-lg-5 mb-3">Search Result of: <?php echo $_GET['s'];?></h3>
			<?php endif; ?>
			<div class="row inner-sec-agileits-w3ls">
					<?php
					
					while ($row = $allTravelPlace->fetch_assoc()) {
						$placeTitle = $row["name"];
						$placeId = $row["id"];
						$placeImage = $row["thumbnail"];
						$placeDivision = $row["division"];
						include('inc/template/place_loop.php');
						$isPlaceFound = true;
					}
					?>
			</div>
			<?php 
				if(!$isPlaceFound){
					echo '<p class="alert alert-danger">Not Found.</p>';
				}
			?>
		</div>
	</section>
	<!--//preocess-->
<?php
	include("footer.php");
?>