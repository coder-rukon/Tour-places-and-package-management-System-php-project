<?php
$bookingPackage = new Booking();

if(isset($_GET['rsbooktype']) && $_GET['rsbooktype']=="cancel"){
    ?>
    <div class="alert alert-danger">
        <h3>Reservation cancel</h3>
        <p>You have not complete your payment. Your reservation has been cancel.</p>
    </div>
    <?php
}
if(isset($_GET['rsbooktype']) && $_GET['rsbooktype']=="fail"){
    ?>
    <div class="alert alert-danger">
        <h3>Payment Fail</h3>
        <p>Payment fail and We can't complete your reservation. Please try again.</p>
    </div>
    <?php
}
if(isset($_GET['rsbooktype']) && $_GET['rsbooktype']=="success"){
    ?>
    <div class="alert alert-success">
        <h3>Congratulations!</h3>
        <p>Your booking has been completed.</p>
    </div>
    <?php
}
?>

<div class="alert alert-secondary" role="alert">Upcoming Tours</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Type</th>
            <th>Date</th>
            <th>Price</th>
            <th>Payment Method</th>
            <th>Paid Amount</th>
            <th>Payment ID</th>
            <th>Total Seat</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $getUpcomingPackage = $bookingPackage->getUpcomingPackage($user);
            while( $row = $getUpcomingPackage->fetch_assoc()){
                
                ?>
                <tr>
                    <td><?php echo $row['packageName']; ?></td>
                    <td><?php echo $row['packageType']; ?></td>
                    <td><?php echo $row['packageDate']; ?></td>
                    <td><?php echo $row['packagePrice']; ?></td>
                    <td><?php echo $row['payment_method']; ?></td>
                    <td><?php echo $row['total']; ?>Tk</td>
                    <td><?php echo $row['payment_id']; ?></td>
                    <td><?php echo $row['total_seat']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td>
                        <a class="btn btn-success" target="_blank" href="package-details.php?package=<?php echo $row['package_id']; ?>">View Package</a>
                    </td>
                </tr>
                <?php
            }
        ?>
        
    </tbody>
</table>
<div class="alert alert-success" role="alert">Previus Tour History</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Type</th>
            <th>Date</th>
            <th>Price</th>
            <th>Payment Method</th>
            <th>Paid Amount</th>
            <th>Payment ID</th>
            <th>Total Seat</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $getPreviusTours = $bookingPackage->getPreviusTours($user);
            while( $row = $getPreviusTours->fetch_assoc()){
                
                ?>
                <tr>
                    <td><?php echo $row['packageName']; ?></td>
                    <td><?php echo isset($row['packageType']) ? $row['packageType'] : ''; ?></td>
                    <td><?php echo $row['packageDate']; ?></td>
                    <td><?php echo $row['packagePrice']; ?></td>
                    <td><?php echo $row['payment_method']; ?></td>
                    <td><?php echo $row['total']; ?>Tk</td>
                    <td><?php echo $row['payment_id']; ?></td>
                    <td><?php echo $row['total_seat']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                </tr>
                <?php
            }
        ?>
        
    </tbody>
</table>