<?php
$menu = "package";
if(!isset($_GET['package'])){
    exit;
}
include("header.php");
    $is_package_form = true;
    $db = new Db();
    $package = new Package($_GET['package']);
    $booking = new Booking();
	?>
	<section class="banner-rs-bottom py-lg-5 py-3">
		<?php ?>
		<div class="container py-lg-4 py-3">
			<?php if(!$package->id): ?>
            <h1>Package Not Found</h1>
            <?php else: 
                $travelPlace = new TravelPlace($package->resort_to);
                $placeObj = new RsGlobal($db->con,'place');
                $placeObj = $placeObj->Get($package->place_from);
                $place = null;
                while($row = $placeObj->fetch_assoc()){
                    $place= $row;
                }
            ?>
            <h1 class="mb-5"><?php echo $package->name; ?></h1>
            <div class="row">
                <div class="col-xs-12 col-sm-7">
                    <?php if($package->image): ?>
                    <img class="package_img" style="max-width:100%;" src="<?php echo $package->image; ?>" alt="<?php echo $package->name; ?>">
                    <?php endif ?>
                    <div class="pk_details"><?php echo $package->details; ?></div>
                </div>
                <div class="col-xs-12 col-sm-5">
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-success"><strong>Route : </strong> <?php echo (isset($place['name']) ? $place['name']:''); ?> <strong>To</strong> <?php echo (isset($travelPlace->name) ? $travelPlace->name:''); ?></li>
                        <li class="list-group-item list-group-item-success"><strong>Type : </strong> <?php echo $package->type; ?></li>
                        <li class="list-group-item list-group-item-success"><strong>Price : </strong> <?php echo $package->price; ?></li>
                        <li class="list-group-item list-group-item-success"><strong>Total Seat : </strong> <?php echo $package->total_seat; ?></li>
                        <li class="list-group-item list-group-item-success"><strong>Available Seat : </strong> <?php echo $package->total_seat - $package->getBookedSeatNumber(); ?></li>
                        <li class="list-group-item list-group-item-success"><strong>Number of Day's : </strong> <?php echo $package->days; ?></li>
                        <li class="list-group-item list-group-item-success"><strong>Date : </strong> <?php echo $package->date; ?></li>
                        <li class="list-group-item list-group-item-success" style="text-transform: capitalize;"><strong>Status : </strong> <?php echo $package->status; ?></li>
                    </ul> 
                    <?php
                        $packageDate = new DateTime($package->date);
                        $todayDate = new DateTime();

                       if($todayDate<$packageDate && $package->status == "ongoing"){
                        ?>
                        <form method="post" class="booking_form" action="package-details.php?package=<?php echo $package->id; ?>">
                            <h2 class="mt-1">Book Now</h2>
                            <?php
                                $message = [];
                                $isBookingRequested = false;
                                $isValid = true;
                                if(isset($_POST['booking_resquest'])){
                                    if(isLogin()){
                                        if(!isset($_POST['booking_seat']) OR empty($_POST['booking_seat']) ){
                                          $message['seat'] = 'Number of seat field is required';
                                          $isValid = false;
                                        }else{
                                            if( $_POST['booking_seat'] > ($package->total_seat - $package->getBookedSeatNumber()) ){
                                                $message['seat'] = 'Seat not available.';
                                                $isValid = false;
                                            }
                                        }
                                        if($isValid){
                                            $bookingId = $booking->Add([
                                                'user_id' => $_SESSION['user']['id'],
                                                'package_id' => $package->id,
                                                'payment_method' => "",
                                                'total' => $_POST['booking_seat'] * $package->price,
                                                'payment_id' => "",
                                                'total_seat' => $_POST['booking_seat'],
                                                'status' => 'pending',
                                            ]);
                                            $isBookingRequested = true;
                                            echo "<meta http-equiv='refresh' content='0;url=".getBaseUrl().'/payment/request.php?booking_id='.$bookingId."'>";
                                        }
                                    }else{
                                        $message['login_required'] = 'You have not sign in. Please login to book your seat.';
                                    }
                                    
                                }

                            ?>
                            <div class="form-group">
                                <label>Number Of Seat</label>
                                <input type="number" name="booking_seat" class="form-control" require max="<?php echo $package->total_seat - $package->getBookedSeatNumber(); ?>" min="1" data-price="<?php echo $package->price; ?>" id="seat_select"/>
                            </div>
                            <h5 class="mt-3">Total : <strong id="total_amount">0</strong></h5>
                            
                            <?php
                                foreach ($message as $key => $value) {
                                    echo '<p class="alert alert-danger">'.$value.'</p>';
                                }
                                if($isBookingRequested){
                                    echo '<p class="alert alert-success mt-1 mb-1">Your booking request has been received. We will verify and confirm your booking. <br/>Thank you</p>';
                                }
                            ?>
                            <button type="submit" name="booking_resquest" value="1" class="btn btn-success">Book Now</button>
                        </form>
                        <?php
                       }

                    ?>
                    
                </div>
            </div>
            <?php endif; ?>
			
		</div>
	</section>
	<?php
	include("footer.php");
?>