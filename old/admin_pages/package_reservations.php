<?php
$booking = new Booking();


if(isset($_GET['confirm'])){
    $booking->update($_GET['confirm'],[
        'status' => "confirmed"
    ]);
}
if(isset($_GET['dell'])){
    $booking->Delete($_GET['dell']);
}
$allBooking = $booking->get();
?>
<table class="table table-bordered">
    
    <tr>
        <td>Customer</td>
        <td>Package</td>
        <td>Requested Seat</td>
        <td>Payment Method</td>
        <td>Payment ID</td>
        <td>Requested Date</td>
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
                    <a href="package-details.php?package=<?php echo $row['package_id']; ?>" target="_blank" class="btn btn-info mt-2">More Details</a>
                </td>
                <td><?php echo $row['total_seat']; ?></td>
                <td><?php echo $row['payment_method']; ?></td>
                <td><?php echo $row['payment_id']; ?></td>
                <td><?php echo $row['requested_date']; ?></td>
                <td><?php echo $row['status']; ?></td>
                <td>
                    <?php
                        if($row['status'] !="confirmed"):

                    ?>
                    <a href="admin.php?p=package_reservations&confirm=<?php echo $row['id']; ?>" class="btn btn-success mb-2">Confirm</a>
                    <?php endif; ?>
                    <a href="admin.php?p=package_reservations&dell=<?php echo $row['id']; ?>" class="btn btn-danger ml-2">Delete</a>
                </td>
            </tr>
            <?php
        }
    ?>
</table>