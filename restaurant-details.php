<?php
$menu = "restaurant";
$page_title = "Restaurant Details";
include("header.php");
$restaurantId = (isset($_GET['restaurant']) ? $_GET['restaurant']: $_GET['p']);
$db = new Db();
$restaurantObg = new RsGlobal($db->con,'restaurant');
$restaurant = $restaurantObg->Get($restaurantId);
$name = "";
$description = "";
$address = "";
$thumbnail = "";
$facility = [];
$phone = "";
$division = "";
$gmap = "";
$nearby_travel_place = [];
while ($row = $restaurant->fetch_assoc()) {
	$name = $row['name'];
	$description  = $row['description'];
	$address  = $row['address'];
	$gmap = $row['gmap'];
	$thumbnail = $row['thumbnail'];
	$phone = $row['phone'];
	$division = $row['division'];
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
					</div>
				</div>
				<!--right-->
				<aside class="col-lg-4 right-blog-con text-right rs_sidebar">
					<div class="right-blog-info text-left">
						<div class="rs_sidebar_box">
							<h4 class="title">Address</h4>
							<p><?php echo $address; ?></p>
							<h4 class="title">Phone</h4>
							<p><?php echo $phone; ?></p>
							<h4 class="title">Division</h4>
							<p><?php echo $division; ?></p>
						</div>
					</div>
				</aside>
			</div>
		</div>
	</section>
	<?php
	include("footer.php");
?>