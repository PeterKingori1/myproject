<?php

if (isset($_GET['id'])) {
 $message;

 changeStatus($_GET['id']);
}

function changeStatus($roomId)
{
 global $message;
 $server_connect = mysqli_connect('localhost', 'root', "", "brunner") or die("Error establishing a connection to the
    server");

 $CheckStatus       = mysqli_query($server_connect, "SELECT * FROM rooms WHERE room_id = '$roomId'");
 $CheckStatusResult = mysqli_fetch_assoc($CheckStatus);

 if ($CheckStatusResult['vacancy'] == 1) {
  $changeStatus = mysqli_query($server_connect, "UPDATE rooms set vacancy =0 WHERE room_id = '$roomId'");
  $message      = "Status change, room " . $roomId . " set to occupied";
  header("refresh: 2 url=rooms.php");
 }
 if ($CheckStatusResult['vacancy'] == 0) {
  $changeStatus = mysqli_query($server_connect, "UPDATE rooms set vacancy =1 WHERE room_id = '$roomId'");

  $message = "Status change, room " . $roomId . " set to vacant";
  header("refresh: 2 url=rooms.php");
 }

}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/rooms.css">
    <title>Brunner | Rooms</title>
</head>

<body>
    <header>
        <div class="link-container">
            <div class="logo">The Brunnner Hotel</div>
            <ul>
                <li> <a href="index.php"> Home</a></li>
                <li> <a href="bookings.php"> Bookings</a></li>
                <li> <a href="logout.php"> <img src="../images/018-log-out.png" alt=""> </a></li>
            </ul>
        </div>
    </header>
    <?php

$status;
require "connection.php";
$roomsQuery  = "SELECT * FROM rooms";
$roomsResult = mysqli_query($server_connect, $roomsQuery);

if (mysqli_num_rows($roomsResult) == 0) {?>
    <div class="error-message">
        You have no booking requests
    </div>

    <?php } else {?>

    <div class="table-container">
        <?php if (!empty($message)): ?>
        <div class="success-message">
            <?php echo $message ?>
        </div>
        <?php endif?>

        <table class="rooms-table">
            <tr class="rooms-row">
                <th>room id</th>
                <th>Type</th>
                <th>status</th>
                <th>Action</th>
            </tr>

            <?php while ($row = mysqli_fetch_assoc($roomsResult)) {?>



            <tr class="rooms-row">
                <td><?php echo $row['room_id'] ?></td>
                <td><?php echo $row['type'] ?></td>
                <td><?php
if ($row['vacancy'] == 0) {
 $status = "occupied";
 ?>

                    <?php } else {
 $status = "vacant";
}

 echo $status;

 ?></td>

                <td> <a href="rooms.php?id=<?=$row['room_id']?>" class="btn">Change status</a></td>
            </tr>

            <?php }?>
            <?php }?>

        </table>


    </div>



</body>

</html>