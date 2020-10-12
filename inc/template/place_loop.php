<?php
	if(!isset($column))
		$column = "col-lg-4";
	if(isset($travel)){
		$placeId = $travel->id;
		$placeTitle = $travel->name;
		$placeImage = $travel->thumbnail;
		$placeDivision = $travel->division;
	}
?>
<div class="rs_col <?php echo $column; ?>">
	<a href="Place-details.php?place=<?php echo $placeId; ?>" style="display: block; text-decoration: none;">
		<div class="card">
			<div class="card-body">
				<div class="img_bg_thumbnail" style="background-image: url('<?php echo $placeImage; ?>');"></div>
				<h5 class="card-title mt-3"><?php echo $placeTitle; ?></h5>
				<p class="card-text">
					<i class="fas fa-map-marker-alt"></i> <?php echo $placeDivision; ?></p>
				
			</div>
		</div>
	</a>
	
</div>