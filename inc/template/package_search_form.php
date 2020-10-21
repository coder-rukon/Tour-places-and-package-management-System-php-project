<?php
	$db = new Db();
	$fromPlace = new RsGlobal($db->con,'place');
	$toTravel = new RsGlobal($db->con,'travel_place');
?>
<div class="banner-rs-info">
			<!--/search_form -->
	<div id="search_form" class="search_top text-center">
		
		<h3>Tour Packages</h3>
		<form action="Package.php" method="post" class="ban-form row">
			<div class="col-md-2 banf">
				<select class="form-control" name="from" id="country12">
					<?php
						$allPlaces = $fromPlace->Get();
						while ($row = $allPlaces->fetch_assoc()) {
							echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
						}
					?>
				</select>
			</div>
			<div class="col-md-2 banf">
				<select id="country13" name="to" class="form-control">
					<?php
						$touristPlace = $toTravel->Get();
						while ($row = $touristPlace->fetch_assoc()) {
							echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
						}
					?>
				</select>
			</div>
			<div class="col-md-2 banf">
					<select id="country13" name="month" class="form-control">
					<?php
						//setlocale(LC_TIME, 'it_IT');
						for($m=1;$m<=12;$m++){
							$dateTemp = mktime(0, 0, 0, $m, 12);
							echo '<option value="'.strftime("%m", $dateTemp ).'">'.strftime("%B", $dateTemp ).'</option>';
						}
					?>
					</select>
			</div>
			<div class="col-md-2 banf">
					<select id="country13" name="year" class="form-control">
					<?php
						for($i = date('Y'); $i <= date('Y') + 5; $i++){
							echo '<option>'.$i.'</option>';
						}
					?>
					</select>
			</div>
			<div class="col-md-2 banf">
				<input class="form-control" type="text" name="days" placeholder="Day's you want to stay?">
			</div>
			<div class="col-md-2 banf">
				<input class="form-control" type="submit" value="Search">
			</div>
		</form>
		
	</div>
	<!--//search_form -->
</div>
