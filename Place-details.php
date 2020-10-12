<?php
$menu = "place";
$page_title = "Travel Place";
$placeId = (isset($_GET['place']) ? $_GET['place']: $_GET['p']);
include("header.php");
$TravelPlace = new TravelPlace();
$travelPlace = $TravelPlace->setFromId($placeId);
$travelSpots = array();
if( isset($travelPlace->tourist_spot['spots']) && !empty($travelPlace->tourist_spot['spots'])){
	$travelSpots=$travelPlace->tourist_spot['spots'];
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
								<a href="">
									<img src="<?php echo $travelPlace->thumbnail; ?>" class="img-fluid" alt="">
								</a>
							</div>
						</div>
						<h3>
							<a href=""><?php echo $travelPlace->name; ?></a>
						</h3>
						<div class="details_contents">
							<p><?php echo $travelPlace->details; ?></p>
						</div>
						<div class="google_map">
							
							<iframe src="<?php echo $travelPlace->gmap; ?>" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
						</div>
						
						<div class="nearby_place">
							<div class="loader">
								<i class="fas fa-spinner fa-spin"></i>
							</div>
							<div class="search_top">
		
								<h3>Nearby Spot</h3>
								<form action="#" method="post" class="ban-form row">
									<input type="hidden" id="place_id" name="id" value="<?php echo $placeId; ?>">
									<div class="col-md-4 banf">
										<select id="spot_from" name="to" class="form-control">
											<?php
												if(isset($travelPlace->tourist_spot['spots']) && is_array($travelPlace->tourist_spot['spots'])){
													foreach ($travelPlace->tourist_spot['spots'] as $key => $value) {
														echo '<option>'.$value.'</option>';
													}
												}
											?>
										</select>
									</div>
									<div class="col-md-1 banf">
										<label for="" class="btn btn-info">To</label>
									</div>
									<div class="col-md-4 banf">
										<select id="spot_to" name="to" class="form-control">
											<?php
												if(isset($travelPlace->tourist_spot['spots']) && is_array($travelPlace->tourist_spot['spots'])){
													foreach ($travelPlace->tourist_spot['spots'] as $key => $value) {
														echo '<option>'.$value.'</option>';
													}
												}
											?>
										</select>
									</div>
									<div class="col-md-3 banf">
										<a href="" class="btn btn-info btn-block" id="btn_spot_details"><i class="fa fa-search"></i></a>
									</div>
								</form>
								<ul class="rs_list mt-4" id="vehiclesList">
									
								</ul>
								
							</div>
						</div>
						<br>
						<br>
						<div class="nearby_tour_places">
							<h4  class="title">Nearby Tour Places</h4>
							<div class="row">
							<?php
								$column = "col-md-4";
								$onlyTitle = true;
								$nearByPlace = $travelPlace->nearby_tour_place;
								foreach ($nearByPlace as $keyPlace => $valuePlace) {
									$tempTrabelPlace = new TravelPlace();
									$travel = $tempTrabelPlace->setFromId($valuePlace);
									include('inc/template/place_loop.php');
								}
							?>
							</div>
						</div>
					</div>
				</div>
				<!--//left-->
				<!--right-->
				<aside class="col-lg-4 right-blog-con text-right">
					<div class="right-blog-info text-left">
						<div class="tech-btm rs_sidebar_box">
							<h4 class="title">Popular Foods</h4>
							<ul class="rs_list">
								<?php
									foreach ($travelPlace->populer_foods as $key => $valueFoods) {
										?>
										<li>
											<h2><?php echo $valueFoods['name']; ?></h2>
											<strong><?php echo $valueFoods['price']; ?></strong>
											<p><?php echo $valueFoods['details']; ?></p>
										</li>
										<?php
									}
								?>
							</ul>
						</div>
						<div class="tech-btm rs_sidebar_box">
							<h4  class="title">Nearby Hotel</h4>
							<div class="row">
							<?php
								$column = "col-md-6";
								$onlyTitle = true;
								$rsGlobal = new RsGlobal($travelPlace->db->con,'');
								$nearbyHotels = implode(',', $travelPlace->nearby_hotel);
								$allHotels = $rsGlobal->Query("SELECT * FROM hotel where id IN($nearbyHotels)");
								if( isset($allHotels->num_rows) AND $allHotels->num_rows>=1){
									while ($row = $allHotels->fetch_assoc()) {
										$hotel = $row;
										include('inc/template/hotel_loop.php');
									}
								}
								
							?>
							</div>
						</div>
						<div class="tech-btm rs_sidebar_box">
							<h4  class="title">Nearby Restaurants</h4>
							<div class="row">
							<?php
								$column = "col-md-6";
								$onlyTitle = true;
								$nearby_restaurants = implode(',', $travelPlace->nearby_restaurants);
								$all_restaurant = $rsGlobal->Query("SELECT * FROM restaurant where id IN($nearby_restaurants)");
								if( isset($all_restaurant->num_rows) AND $all_restaurant->num_rows>=1){
									while ($row = $all_restaurant->fetch_assoc()) {
										$restaurant = $row;
										include('inc/template/restaurant_loop.php');
									}
								}
								
							?>
							</div>
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