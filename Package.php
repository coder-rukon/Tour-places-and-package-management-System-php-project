<?php
$menu = "package";
$is_package_form = true;
	include("header.php");
	$package = new Package();
	/*$packageVeriations = array();
	$packageVeriations[] = new PackageRow("Basic","350","Basic details",["Text Dummy 1","Text Dummy 2","Text Dummy 3"]);
	$package->addPackage(20,30,10,$packageVeriations);*/
	
	?>
	<section class="banner-rs-bottom py-lg-5 py-3">
		<?php ?>
		<div class="container py-lg-4 py-3">
			
			
			<div class="card-deck text-center row">
				<?php
				if(isset($_REQUEST['from']) && isset($_REQUEST['to']) && isset($_REQUEST['days'])){
					$tempDate = $_REQUEST['year'].'-'.$_REQUEST['month'];
					$packageFound = $package->searchPackage($_REQUEST['from'],$_REQUEST['to'],$_REQUEST['days'],$tempDate);
					if($packageFound){
						$modal_id = "";
						while ( $row = $packageFound->fetch_assoc() ) {
								?>
								<div class="price-info-grid col-lg-3">
									<div class="price-inner mb-3">
										<div class="price-header">
											<h4><?php echo $row['name']; ?></h4>
										</div>
										<div class="price-body">
											<h5 class="pricing-title">
												<span class="align-top">$</span><?php echo $row['price']; ?>
											</h5>
											<ul class="list-unstyled mt-3 mb-4" style="text-align:left;">
												<li class="py-2 border-bottom"><strong>Days</strong> <?php echo $row['days']; ?></li>
												<li class="py-2 border-bottom"><strong>Date</strong> <?php echo $row['date']; ?></li>
												<li class="py-2 border-bottom"><strong>Type</strong> <?php echo $row['type']; ?></li>
											</ul>
											
											<a href="package-details.php?package=<?php echo $row['id']; ?>" class="btn btn-block btn-outline-primary py-2">Book Now</a>
										</div>
									</div>
								</div>
								<?php
							
						}
						
					}else{
						echo '<div class="col-xs-12 col-sm-12"><h2>Package not found.</h2></div>';
					}
				}else{
					$packageFound = $package->Get();
					if($packageFound){
						$modal_id = "";
						while ( $row = $packageFound->fetch_assoc() ) {
								?>
								<div class="price-info-grid col-lg-3">
									<div class="price-inner mb-3">
										<div class="price-header">
											<h4><?php echo $row['name']; ?></h4>
										</div>
										<div class="price-body">
											<h5 class="pricing-title">
												<?php echo $row['price']; ?><span class="align-top">TK</span>
											</h5>
											<ul class="list-unstyled mt-3 mb-4" style="text-align:left;">
												<li class="py-2 border-bottom"><strong>Days</strong> <?php echo $row['days']; ?></li>
												<li class="py-2 border-bottom"><strong>Date</strong> <?php echo $row['date']; ?></li>
												<li class="py-2 border-bottom"><strong>Type</strong> <?php echo $row['type']; ?></li>
												<li class="py-2 border-bottom"  style="text-transform: capitalize;"><strong>Status</strong> <?php echo $row['status']; ?></li>
											</ul>
											
											<a href="package-details.php?package=<?php echo $row['id']; ?>" class="btn btn-block btn-outline-primary py-2">Book Now</a>
										</div>
									</div>
								</div>
								<?php
							
						}
					}
				}
				?>
			</div>
		</div>
	</section>
	<?php
	include("footer.php");
?>