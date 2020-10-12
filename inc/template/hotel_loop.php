<?php
	if(!isset($column))
		$column = "col-lg-4";
	
	if(!isset($onlyTitle))
		$onlyTitle = false;
if(!isset($hotel))
	return;
?>
<div class="rs_col <?php echo $column; ?>">
	<a href="Hotel-details.php?hotel=<?php echo $hotel['id']; ?>" class="card hotel_loop_item">
		<div class="card-body">
			<div class="img_bg_thumbnail" style="background-image: url('<?php echo $hotel['thumbnail']; ?>');"></div>
			<?php if(!empty($hotel['offer'])): ?>
			<div class="label-inner">
				<span class="status"><?php echo $hotel['offer']; ?></span>
			</div>
			<?php endif; ?>
			<h5 class="card-title mt-3"><?php echo $hotel['name']; ?>
					<?php if(!$onlyTitle): ?>
					<span style="display: block; margin-top: 5px;"><?php echo $hotel['budget_min']; ?> - <?php echo $hotel['budget_max']; ?> TK</span>
					<?php endif; ?>
			</h5>
			<?php if(!$onlyTitle): ?>
			
			<?php endif; ?>
		</div>
	</a>
</div>