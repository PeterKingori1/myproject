<?php

require("connection.php");


$fname = $_SESSION['first_name'];
$lname = $_SESSION['last_name'];
$staff_type = $_SESSION['staff_type'];



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/index.css">
    <title>Brunner | Staff</title>
</head>

<body>
    <header>
        <div class="link-container">
            <div class="logo">The Brunnner Hotel</div>
            <ul>

                <li> <a href="rooms.php"> Rooms</a></li>
                <li> <a href="bookings.php">Bookings</a></li>
                <li> <a href="logout.php"> <img src="../images/018-log-out.png" alt=""> </a></li>

            </ul>
        </div>
    </header>
    <?php

$status;
$vacantRoomsQuery = "SELECT COUNT(*) AS number FROM `rooms` WHERE vacancy = 1";

$vacantRoomsResult = mysqli_query($server_connect, $vacantRoomsQuery);

$row = mysqli_fetch_assoc($vacantRoomsResult);


    ?>

    <div class="card-container">
        <div class="card room">
            <h2>Rooms</h2>
            <!-- <p> rooms booked</p> -->
            <p> <?= $row['number'] ?> rooms free</p>
            <a href="rooms.php" id="show">Go</a>
        </div>


        <div class="card bookings">
            <h2>Bookings</h2>
            <p>10 bookings</p>
            <p>8 processed</p>
            <a href="bookings.php">Go</a>
        </div>

        <div class="card settings">
            <h2>Account</h2>
            <p> <?php echo $fname . " " .  $lname ?> </p>
            <p><?php echo $staff_type?></p>
            <a href="useraccount.php">Go</a>
        </div>

        <?php if($staff_type == "admin"): ?>

        <div class="card admin">
            <h2>Admin</h2>
            <p>Add staff</p>
            <p>See complaints</p>
            <a href="admin.php">Go</a>
        </div>

        <?php endif ?>
    </div>






</body>

</html>