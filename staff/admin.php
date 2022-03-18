<?php
require_once "connection.php";

$getStaffSql = "SELECT * FROM staff ";

$getStaffQuery = mysqli_query($server_connect, $getStaffSql);


$message;

if (isset($_GET['makeAdmin'])) {

    $id = $_GET['makeAdmin'];

    $getUserDetails = "SELECT * FROM staff WHERE staff_id = '$id'";

    $getResult = mysqli_query($server_connect, $getUserDetails);

    $row = mysqli_fetch_assoc($getResult);
    
    if($row['type'] == "staff"){
    
    $makeAdmin = "UPDATE staff SET type = 'admin' ";
    $makeResult = mysqli_query($server_connect, $makeAdmin);

    $message = "Change successfull, User is now an admin";

    header("refresh:2 url=admin.php");
    }
}

if(isset($_GET['delete'])){

    $id = $_GET['delete'];

    $deleteStaff = "DELETE FROM staff where staff_id = '$id'";

    if(mysqli_query($server_connect, $deleteStaff)){
        $message = "User removed successfully";

        header("refresh:2 url=admin.php");
    }
}

if(isset($_POST['submit'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $password = $_POST['password'];
    $type = $_POST['type'];

    $addStaff = "INSERT INTO staff(first_name, last_name, email, phone_number , password, type) VALUES('$first_name', '$last_name', '$email', '$phone_number', '$password', '$type')";

    if(mysqli_query($server_connect, $addStaff)){
           $message = "User added successfully";

           header("refresh:2 url=admin.php");
    }
}

if(isset($_POST['submit-room'])){
    $room_type= $_POST['room-type'];

    $addRoom = "INSERT INTO rooms(type, vacancy) VALUES('$room_type', 1)";

     if(mysqli_query($server_connect, $addRoom)){
     $message = "Room added successfully";

     header("refresh:2 url=admin.php");
     }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/admin.css">
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



    <div class="side-bar">
        <button class="staff-button">Staff</button>
        <button class="rooms-button">Rooms</button>

    </div>

    <section>

        <?php if(!empty($message)): ?>
        <div class="success-message">
            <?= $message ?>
        </div>

        <?php endif ?>

        <div class="staff-section">



            <table class="staff-table">
                <tr>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Emailname</th>
                    <th>Phone number</th>
                    <th>Type</th>
                    <th colspan="2">Actions</th>

                </tr>
                <?php while ($row = mysqli_fetch_assoc($getStaffQuery)): ?>


                <tr>
                    <td><?=$row['first_name']?></td>
                    <td><?=$row['last_name']?></td>
                    <td><?=$row['email']?></td>
                    <td><?=$row['phone_number']?></td>
                    <td><?=$row['type']?></td>
                    <td> <a href="admin.php?delete=<?=$row['staff_id']?>" class="btn btn-remove"> Remove</a></td>

                    <?php if($row['type'] == "staff"): ?>
                    <td> <a href="admin.php?makeAdmin=<?=$row['staff_id']?>" class="btn btn-add-admin"> Make admin</a>
                        <?php endif ?>
                    </td>
                </tr>

                <?php endwhile?>

            </table>

            <form method="post">
                <h2>Add staff member</h2>
                <div class="input-container">
                    <input type="text" name="first_name" placeholder="First name">
                    <input type="text" name="last_name" placeholder="last name">
                    <input type="text" name="phone_number" placeholder="Phone number">
                </div>

                <div class="input-container">
                    <input type="text" name="email" placeholder="email">
                    <input type="text" name="password" placeholder="password">
                </div>

                <div class="input-container">

                    <input type="radio" name="type" value="staff">Staff
                    <input type="radio" name="type" value="admin">Admin
                </div>

                <button name="submit">Insert</button>
            </form>
        </div>

        <div class="rooms-section">
            <form method="post">
                <h2>Add room</h2>
                <div class="input-container">
                    <label for="type">Select type of room</label><br>
                    <input type="radio" name="room-type" value="single">Single
                    <input type="radio" name="room-type" value="double">Double
                </div>
                <button name="submit-room">Insert</button>
            </form>
        </div>
    </section>


    <script src="./assets/admin.js"></script>
</body>

</html>