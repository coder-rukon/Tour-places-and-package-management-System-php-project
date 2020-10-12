<?php
$booking = new Booking();
if(isset($_GET['confirm'])){
    $booking->update($_GET['confirm'],[
        'status' => "confirmed"
    ]);
}
if(isset($_GET['dell'])){
    $booking->Delete($_GET['dell']);
    $message = "Reservation has been cancel.";
}

if(isset($_GET['package']) && !empty($_GET['package'])){
    $allBooking = $booking->getByPackage($_GET['package']);
}else{
    $allBooking = $booking->get();
}
$packageObj = new Package();
$allPackage =  $packageObj->get();
?>
<form action="<?php echo getBaseUrl().'/admin.php'; ?>" method="get" class="row mb-5">
    <input type="hidden" name="p" value="package_reservations">
    <div class="col-8">
        <label>Filter by Package</label>
        <select class="form-control" name="package">
            <option value="">All</option>
            <?php 
            while ( $row =$allPackage->fetch_assoc()) {
                if(isset($_GET['package'] ) && $_GET['package']  == $row['id'] ){
                    echo "<option selected value='".$row['id']."'>".$row['name'] ."</option>";
                }else{
                    echo "<option value='".$row['id']."'>".$row['name'] ."</option>";
                }
            }
            ?>
        </select>
    </div>
    <div class="col-4">
        <button type="submit" class="btn btn-success btn-block mt-4 btn-lg">Filter</button>
    </div>
    
</form>
<?php
    if(isset($message) && !empty($message)):
    ?>
    <div class="alert alert-success"><?php echo $message; ?></div>
    <?php
    endif;
?>
<table class="table table-bordered">
    
    <tr>
        <td>Customer</td>
        <td>Package</td>
        <td>Seat</td>
        <td>Payment Method</td>
        <td>Payment ID</td>
        <td>Paid Amount</td>
        <td>Status</td>
        <td>Action</td>
    </tr>
    <?php
        while( $row = $allBooking->fetch_assoc()){
            $user = new Users($row['user_id']);
            $package = new Package($row['package_id']);
            ?>
            <tr>
                <td>
                    <strong>Name</strong><br/> <?php echo $user->name; ?> <br/>
                    <strong>Email</strong><br/> <?php echo $user->email; ?> <br/>
                </td>
                <td>
                    <strong>Package Name</strong><br/> <?php echo $package->name; ?> <br/>
                    <strong>Tour Date</strong><br/> <?php echo $package->date; ?> <br/>
                    <strong>Type</strong><br/> <?php echo $package->type; ?> <br/>
                    <a href="<?php echo getBaseUrl(); ?>/package-details.php?package=<?php echo $row['package_id']; ?>" target="_blank" class="btn btn-info mt-2">More Details</a>
                </td>
                <td><?php echo $row['total_seat']; ?></td>
                <td><?php echo $row['payment_method']; ?></td>
                <td><?php echo $row['payment_id']; ?></td>
                <td><?php echo $row['total']; ?>Tk</td>
                <td><?php echo $row['status']; ?></td>
                <td>
                    <?php
                        if($row['status'] !="confirmed"):
                    ?>
                    <a href="<?php echo getBaseUrl(); ?>/admin.php?p=package_reservations&confirm=<?php echo $row['id']; ?>" class="btn btn-success mb-2">Confirm</a>
                    <?php endif; ?>
                    <a href="<?php echo getBaseUrl(); ?>/admin.php?p=package_reservations&dell=<?php echo $row['id']; ?>" class="btn btn-danger ml-2">Cancel</a>
                </td>
            </tr>
            <?php
        }
    ?>
</table>