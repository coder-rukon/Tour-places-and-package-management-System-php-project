<?php
$travelObj = new TravelPlace();
$globalObj = new RsGlobal($travelObj->db->con);
$allTravelPlace = $travelObj->Get(null,6);
?>
<section class="banner-rs-bottom py-lg-5 py-3">
	<div class="container py-lg-4 py-3">
		<h3 class="tittle ser text-center mx-auto mb-lg-5 mb-3 ">Find your travel place in Divisions</h3>
		<div class="inner-sec-agileits-w3ls">
			<div class="row">
				<?php
					$icons = ['fa-city','fa-suitcase-rolling','fa-building','fa-layer-group','fa-graduation-cap','fa-globe','fa-place-of-worship','fa-paper-plane '];
					foreach (GetDivision() as $keyDivision => $valueDivision) {
						?>
							<div class="col-xs-6 col-sm-3">
								<a href="Places.php?division=<?php echo $valueDivision; ?>" class="rs_icon_box">
									<div class="gd-box-info text-center p-lg-4 p-4 rounded">
										<div class="gd-box-con">
											<i style="font-size: 70px" class="fas <?php echo (isset($icons[$keyDivision]) ? $icons[$keyDivision]: "fa-city"); ?>"></i>
											<h4><?php echo $valueDivision; ?></h4>
										</div>
									</div>
								</a>
							</div>
						<?php
					}
				?>
			</div>
		</div>
	</div>
</section>
<!--/process-->
	<section class="banner-rs-bottom py-lg-5 py-3" id="plats">
		<div class="container py-lg-4 py-3">
			<h3 class="tittle text-center mb-lg-5 mb-3">Recent tourists place</h3>
			<div class="row inner-sec-agileits-w3ls">
				<div class="row t-in">
					<?php
					while ($row = $allTravelPlace->fetch_assoc()) {
						$placeTitle = $row["name"];
						$placeId = $row["id"];
						$placeImage = $row["thumbnail"];
						$placeDivision = $row["division"];
						include('inc/template/place_loop.php');
					}
					?>
				</div>
			</div>
		</div>
	</section>
	<!--//preocess-->
<section class="banner-rs-bottom py-lg-5 py-3">
	<div class="container py-lg-4 py-3">
		<h3 class="tittle ser text-center mx-auto mb-lg-5 mb-3 ">Recent Gallery Images</h3>
		<div class="inner-sec-agileits-w3ls">
			<ul class="image_gallery clearfix">
				<?php
					$gallery = new Gallery();
					$allGalleryItems = $gallery->Get(null,12);
					while ($item = $allGalleryItems->fetch_assoc()) {
						?>
							<li class="image_gallery_item">
								<a href="Gallery-details.php?p=<?php echo $item['id']; ?>" data-gal="prettyPhoto[gallery]">
									<div class="img_bg_thumbnail" style="background-image: url('<?php echo $item['thumbnail']; ?>');"></div>
								</a>
							</li>
						<?php
					}
				?>
			</ul>
		</div>
	</div>
</section>
	<section class="stats_test container-fluid">
		
		<div class="row inner_stat_wthree_agileits">
			<div class="col-sm-3 col-6 py-5 stats_info counter_grid">
				<i class="fas far fa-map-marker-alt "></i>
				<p class="counter"><?php echo $globalObj->Count("travel_place"); ?></p>
				<h4>Places</h4>
			</div>
			<div class="col-sm-3 col-6 py-5 stats_info counter_grid1">
				<i class="fas far fa-hotel"></i>
				<p class="counter"><?php echo $globalObj->Count("hotel"); ?></p>
				<h4>Hotels</h4>
			</div>
			<div class="col-sm-3 col-6 py-5 stats_info counter_grid2">
				<i class="fas far fa-images"></i>
				<p class="counter"><?php echo $globalObj->Count("gallery"); ?></p>
				<h4>Gallery Images</h4>
			</div>
			<div class="col-sm-3 col-6 py-5 stats_info counter_grid3">
				<i class="fas far fa-users"></i>
				<p class="counter"><?php echo $globalObj->Count("users"); ?></p>
				<h4>Tourist</h4>
			</div>
		</div>
	</section>