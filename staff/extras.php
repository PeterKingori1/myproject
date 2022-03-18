<?php
require_once "connection.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/extras.css">

    <title>Brunner | Staff</title>
</head>

<body>
    <header>
        <div class="link-container">
            <div class="logo">The Brunnner Hotel</div>

        </div>

    </header>



    <div class="extras-container">
        <?php
if (isset($_GET["getID"])): 
 $bookingID = $_GET['getID'];
 $sql       = "SELECT * FROM booking WHERE booking_id = '$bookingID'";
 $result    = mysqli_query($server_connect, $sql);

 while($row = mysqli_fetch_assoc($result)) :

   

 ?>

        <h2>Extras</h2>
        <p>Name: <span> <?php echo $row['first_name'] . " " . $row['last_name']  ?></span></p>
        <hr>
        <p><?php  echo $row['extra'] ?></p>
        <?php endwhile ?>
        <?php endif ?>

        <a href="bookings.php">Back</a>

    </div>
</body>

</html>