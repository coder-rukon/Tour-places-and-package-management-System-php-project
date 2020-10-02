<?php
if(!isset($_GET['p']))
	header("location:404.php");
$menu = "gallery";
$page_title = "Gallery";
	include("header.php");

$gallery = new Gallery($_GET['p']);
$recentItems = $gallery->Get(null,8);
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
									<img src="<?php echo $gallery->thumbnail; ?>" class="img-fluid" alt="">
								</a>
							</div>
						</div>

						<h3>
							<a href=""><?php echo $gallery->name; ?></a>
						</h3>
						<div class="gallery_contents">
							<p><?php echo $gallery->content; ?></p>
						</div>
					</div>

				</div>

				<!--//left-->
				<!--right-->
				<aside class="col-lg-4 right-blog-con text-right">
					<div class="right-blog-info text-left">
						<div class="tech-btm">
							<h4>Recent Images</h4>
							<?php
								while ($item = $recentItems->fetch_assoc()) {
									?>
									<div class="blog-grids row mb-3">
										<div class="col-md-5 blog-grid-left">
											<a href="Gallery-details.php?p=<?php echo $item['id']; ?>">
												<img src="<?php echo $item['thumbnail']; ?>" class="img-fluid rounded" alt="">
											</a>
										</div>
										<div class="col-md-7 blog-grid-right">

											<h5>
												<a href="Gallery-details.php?p=<?php echo $item['id']; ?>"><?php echo $item['name']; ?></a>
											</h5>
										</div>

									</div>
									<?php
								}
							?>
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