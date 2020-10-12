<?php
$menu = "gallery";
$page_title = "Gallery";
	include("header.php");
$gallery = new Gallery();
$allGalleryItems = $gallery->Get();
	?>
<section class="banner-rs-bottom py-lg-5 py-3">
	<div class="container py-lg-4 py-3">
		<div class="inner-sec-agileits-w3ls">
			<ul class="image_gallery clearfix">
				<?php
					while($item = $allGalleryItems->fetch_assoc()) {
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
	<?php
	include("footer.php");
?>