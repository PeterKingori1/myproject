<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/bookings.css">

    <title>Brunner | Staff</title>
</head>

<body>
    <header>
        <div class="link-container">
            <div class="logo">The Brunnner Hotel</div>
            <ul>
                <li> <a href="index.php"> Home</a></li>
                <li> <a href="rooms.php"> Rooms</a></li>
                <li> <a href="logout.php"> <img src="../images/018-log-out.png" alt=""> </a></li>
            </ul>
        </div>


    </header>

    <div class="table-container">
        <?php 
    require("connection.php");

    $y = "hello";
    $bookingsQuery = "SELECT * FROM booking";
    $bookingsResult = mysqli_query($server_connect, $bookingsQuery);

    if(mysqli_num_rows($bookingsResult) == 0 ){
        ?>

        <div class="error-message">
            You have no booking requests
        </div>





        <?php } else{ ?>
        <table class="bookings-table">
            <tr class="bookings-row">
                <th>first name</th>
                <th>last name</th>
                <th>email</th>
                <th>Phone number</th>
                <th>type</th>
                <th>Guest number</th>
                <th>Check in date</th>
                <th>check Out date</th>
                <th>Extras</th>

            </tr>
            <?php  while($row = mysqli_fetch_assoc($bookingsResult)){?>


            <tr class="bookings-row">

                <td><?php echo $row['first_name'] ?></td>
                <td><?php echo $row['last_name'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo $row['phone_number'] ?></td>
                <td><?php echo $row['type'] ?></td>
                <td><?php echo $row['guest_number'] ?></td>
                <td><?php echo $row['check_in_date'] ?></td>
                <td><?php echo $row['check_out_date'] ?></td>
                <td>
                    <a href="extras.php?getID=<?php  echo $row['booking_id'] ?> " class="extras-link">
                        <img src="../images/049-eye-1.png" alt="">
                    </a>
                </td>

            </tr>

            <?php }?>
            <?php }?>
        </table>
    </div>

    <div class="extras-container">

        <h2>Extras</h2>


    </div>


    <script src="./assets/bookings.js">

    </script>
</body>

</html>