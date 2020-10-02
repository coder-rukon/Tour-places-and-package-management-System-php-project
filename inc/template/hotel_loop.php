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
			<img src="<?php echo $hotel['thumbnail']; ?>" alt="" class="img-fluid" />
			<?php if(!empty($hotel['offer'])): ?>
			<div class="label-inner">
				<span class="status"><?php echo $hotel['offer']; ?></span>
			</div>
			<?php endif; ?>
			<h5 class="card-title mt-3"><?php echo $hotel['name']; ?>
					<?php if(!$onlyTitle): ?>
					<span style="display: block; margin-top: 5px;"><?php echo $hotel['budget_min']; ?> - <?php echo $hotel['budget_max']; ?></span>
					<?php endif; ?>
			</h5>
			<?php if(!$onlyTitle): ?>
			<ul class="property-box">
				<li class="field-item">
					<span>
						<i class="fas  fa-map-marker-alt"></i>
					</span> 
					<?php echo $hotel['address']; ?>
				</li>
			</ul>
			<?php endif; ?>

		</div>
	</a>
</div>