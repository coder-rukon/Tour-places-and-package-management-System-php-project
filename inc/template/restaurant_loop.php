<?php
	if(!isset($column))
		$column = "col-lg-4";
	
	if(!isset($onlyTitle))
		$onlyTitle = false;
if(!isset($restaurant))
	return;
?>
<div class="rs_col <?php echo $column; ?>">
	<a href="restaurant-details.php?restaurant=<?php echo $restaurant['id']; ?>" class="card restaurant_loop_item">
		<div class="card-body">
			<img src="<?php echo $restaurant['thumbnail']; ?>" alt="" class="img-fluid" />
			<h5 class="card-title mt-3"><?php echo $restaurant['name']; ?>
					<?php if(!$onlyTitle): ?>
					<span style="display: block; margin-top: 5px;"><?php echo $restaurant['budget_min']; ?> - <?php echo $restaurant['budget_max']; ?></span>
					<?php endif; ?>
			</h5>
			<?php if(!$onlyTitle): ?>
			<ul class="property-box">
				<li class="field-item">
					<span>
						<i class="fas  fa-map-marker-alt"></i>
					</span> 
					<?php echo $restaurant['address']; ?>
				</li>
			</ul>
			<?php endif; ?>

		</div>
	</a>
</div>