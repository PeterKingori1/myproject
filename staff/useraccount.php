<?php
require "connection.php";

$fname = $_SESSION['first_name'];

$lname = $_SESSION['last_name'];

$id = $_SESSION['staff_id'];

$staff_type = $_SESSION['staff_type'];

$message;

if (isset($_POST['update'])) {
    $first_name   = $_POST['first_name'];
    $last_name    = $_POST['last_name'];
    $email        = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $password     = $_POST['password'];

    $updateQuery = "UPDATE staff set first_name = '$first_name', last_name = '$last_name', email = '$email', phone_number = '$phone_number', password = '$password'  WHERE staff_id = '$id' ";

    if (mysqli_query($server_connect, $updateQuery)) {
        $message = "Update successfull, Details chnaged";
    } else {
        echo "unsuccessfull";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/useraccount.css">
    <title>Brunner | Staff</title>
</head>

<body>
    <header>
        <div class="link-container">
            <div class="logo">The Brunnner Hotel</div>
            <ul>
                <li> <a href="index.php"> Home</a></li>
                <li> <a href="rooms.php"> Rooms</a></li>
                <li> <a href="bookings.php">Bookings</a></li>
                <li> <a href="logout.php"> <img src="../images/018-log-out.png" alt=""> </a></li>

            </ul>
        </div>
    </header>
    <?php

$status;
$getInfo = "SELECT * FROM `staff` WHERE staff_id = '$id' ";

$infoResult = mysqli_query($server_connect, $getInfo);

$row = mysqli_fetch_assoc($infoResult);
?>

    <div class="form-container">

        <form method="post">

            <?php if (!empty($message)): ?>
            <div class="success-message">
                <?=$message?>
            </div>
            <?php endif?>

            <div class="input-container">
                <label for="firstname">First Name</label>
                <input type="text" name="first_name" value="<?=$row['first_name']?>">
            </div>
            <div class="input-container">
                <label for="lastname">LastName</label>
                <input type="text" name="last_name" value="<?=$row['last_name']?>">
            </div>
            <div class="input-container">
                <label for="email">email</label>
                <input type="text" name="email" value="<?=$row['email']?>">
            </div>
            <div class="input-container">
                <label for="phone_number">Phone Number</label>
                <input type="text" name="phone_number" value="<?=$row['phone_number']?>">
            </div>
            <div class="input-container">
                <label for="password">Password</label>
                <input type="text" name="password" value="<?=$row['password']?>">
            </div>

            <div class="input-container">
                <button name="update">Change</button>
            </div>

        </form>

    </div>

</body>

</html>