<?php
$menu = "hotel";
$page_title = "Hotel Details";
include("header.php");
$hotelId = (isset($_GET['hotel']) ? $_GET['hotel']: $_GET['p']);
$db = new Db();
$hotelObj = new RsGlobal($db->con,'hotel');
$hotel = $hotelObj->Get($hotelId);
$name = "";
$description = "";
$address = "";
$thumbnail = "";
$facility = [];
$phone = "";
$division = "";
$gmap = "";
$nearby_travel_place = [];
while ($row = $hotel->fetch_assoc()) {
	$name = $row['name'];
	$description  = $row['description'];
	$address  = $row['address'];
	$gmap = $row['gmap'];
	$thumbnail = $row['thumbnail'];
	$phone = $row['phone'];
	$division = $row['division'];
	$facility = json_decode($row['facility'],true);
	$nearby_travel_place = json_decode($row['nearby_travel_place'],true);
}
	?>
<section class="banner-w3layouts-bottom py-lg-5 py-3">
		<div class="container py-lg-4 py-3">
			<div class="row">
				<!--left-->
				<div class="col-lg-8 left-blog-info text-left">
					<div class="blog-grid-top">
						<div class="b-grid-top">
							<div class="blog_info_left_grid">
								<a href="single.html">
									<img src="<?php echo $thumbnail; ?>" class="img-fluid" alt="">
								</a>
							</div>
						</div>
						<h3>
							<a href=""><?php echo $name; ?></a>
						</h3>
						<div class="details_contents">
							<p><?php echo $description; ?></p>
						</div>
						
						<div class="google_map">
							<iframe src="<?php echo $gmap; ?>" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
							
						</div>
						<div class="nearby_places mt-20">
							<h4 class="title">Nearby Places</h4>
							<div class="row place_row">
								<?php
									$column = "col-md-6";
									$TravelPlace = new TravelPlace();
									if(is_array($nearby_travel_place)):
										foreach ($nearby_travel_place as $keyPlace => $valuePlace) {
											$travel = $TravelPlace->setFromId($valuePlace);
											include('inc/template/place_loop.php');
										}
									endif;
								?>
							</div>
						</div>
					</div>
				</div>
				<!--//left-->
				<!--right-->
				<aside class="col-lg-4 right-blog-con text-right rs_sidebar">
					<div class="right-blog-info text-left">
						<div class="rs_sidebar_box">
							<h4 class="title">Hotel Address</h4>
							<p><?php echo $address; ?></p>
							<h4 class="title mt-4">Hotel Facility</h4>
							<ul class="rs_list mt-4" id="vehiclesList">
								<?php
								if(is_array($facility) && !empty($facility)):
									foreach ($facility as $key => $value) {
										?>
										<li>
											<h2><?php echo $value['name']; ?></h2>
											<p><?php echo $value['description']; ?></p>
										</li>
										<?php
									}
								endif;
								?>
							</ul>
						</div>
					</div>
				</aside>
				<!--//right-->
			</div>
		</div>
	</section>
	<?php
	include("footer.php");
?>