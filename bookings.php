<?php
require "./includes/connection.php";
if (isset($_POST['book'])) {
  
  $booking_id   = uniqid('bk-id');
  $fname        = $_POST['first_name'];
  $lname        = $_POST['last_name'];
  $email        = $_POST['email'];
  $pnumber      = $_POST['phone_number'];
  $type         = $_POST['type'];
  $gnumber      = $_POST['guest_number'];
  $checkInDate  = $_POST['check_in_date'];
  $checkOutDate = $_POST['check_out_date'];
  $extras       = $_POST['extras'];
  $checkRoomType       = "SELECT * FROM rooms WHERE type = '$type' AND vacancy = true";
  $checkRoomTypeResult = mysqli_query($server_connect, $checkRoomType);
  if (mysqli_num_rows($checkRoomTypeResult) >= 1) {
    $insert_stmt = "INSERT INTO booking (booking_id, first_name, last_name, email, phone_number, type, guest_number, check_in_date, check_out_date, extra)
    VALUES ('$booking_id', '$fname', '$lname', '$email' ,'$pnumber',  '$type' , '$gnumber', '$checkInDate' , '$checkOutDate', '$extras' )";
    $sql_result = mysqli_query($server_connect, $insert_stmt);
    ?>
<?php
if (!$sql_result) {?>
<div class="error-message">
    Unable to proccess the request. Please try again later
</div>
<?php } else {?>
<div class="success-message">
    Your request is being processed. A confirmation will be sent to your email
</div>
<?php }?>
<?php } else { ?>
<div class="error-message"><?php echo "No " . $type . " rooms available" ?> </div>

<?php }  ?>
<?php 
  $updateQuery = "UPDATE rooms set vacancy = false WHERE vacancy = true AND type = '$type' limit 1";
  $updateQueryResult = mysqli_query($server_connect, $updateQuery);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./assets/style.css" />
    <title>The Brunner Hotel</title>
</head>

<body>
    <header>

        <div class="toggle"></div>
        <div class="navigation">
            <ul class="link-container">
                <li><a href="index.html">Home</a></li>
                <li><a href="services.html">Services</a></li>
                <li><a href="gallery.html">Gallery</a></li>
                <a href=" ./staff/" class="staff-portal-icon"> <img src="
                        ./images/021-admin-4.png" alt=""></a>
            </ul>
            <div class="social-bar">
                <ul>
                    <li>
                        <a href="https://facebook.com">
                            <img src="images/facebook.png" target="_blank" alt="" />
                        </a>
                    </li>
                    <li>
                        <a href="https://twitter.com">
                            <img src="images/twitter.png" target="_blank" alt="" />
                        </a>
                    </li>
                    <li>
                        <a href="https://instagram.com">
                            <img src="images/instagram.png" target="_blank" alt="" />
                        </a>
                    </li>
                </ul>
                <a href="mailto:you@email.com" class="email-icon">
                    <img src="images/email.png" alt="" />
                </a>
            </div>
        </div>
    </header>

    <div class=" title booking">

        <h1>Bookings</h1>
        <p>
            As we continueto develop, were are starting to appreciate technology and all that it brings with it. Lorem
            ipsum dolor sit, amet consectetur adipisicing elit. Iste excepturi suscipit soluta temporibus facere illum
            optio hic quibusdam cum laboriosam neque explicabo in libero dicta culpa at, quae aspernatur possimus!

        </p>

        <h2>For booking of more than 10 people please contact us directly</h2>

        <a class="continue-button" href="#form"><img src="./images/031-up-arrow.png" alt=""></a>
    </div>



    <div class="contact" id="form">
        <div class="contact-form">
            <form method="POST" action="bookings.php">
                <h1>Fill out the form and confirm Booking</h1>
                <div class="row">


                    <div class="input50">
                        <input type="text" required placeholder="First Name" name="first_name" />
                    </div>
                    <div class="input50">
                        <input type="text" required placeholder="Last Name" name="last_name" />
                    </div>
                </div>
                <div class="row">
                    <div class="input50">
                        <input type="text" required placeholder="Email" name="email" />
                    </div>
                    <div class="input50">
                        <input type="text" required placeholder="Phone Number" name="phone_number" />
                    </div>
                </div>
                <div class="row radio">
                    <label>Type of room</label>

                    <input type="radio" name="type" value="single" />single

                    <input type="radio" name="type" value="double" />Double

                </div>

                <div class="row">

                    <div class="input50">

                        <input type="number" name="guest_number" min="1" max="10" placeholder="number of people"
                            required>
                    </div>

                </div>

                <div class="row">


                    <div class="input50">
                        <label for="date">Check in date</label>
                        <input type="date" placeholder="Check in date" name="check_in_date" required />
                    </div>
                    <div class="input50">
                        <label for="date">Check out date</label>
                        <input type="date" placeholder="Check out date " name="check_out_date" required />
                    </div>
                </div>


                <div class="row">
                    <div class="input100">
                        <textarea placeholder="Please specify extra feature to be added to your package"
                            name="extras"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="input100">
                        <button name="book" class="btn"> Book </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="contact-info">
            <div class="info-box">
                <img src="images/address.png" class="contact-icon" alt="" />
                <div class="details">
                    <h4>Address</h4>
                    <p>25 Park Ave. Nairobi Kenya</p>
                </div>
            </div>
            <div class="info-box">
                <img src="images/email.png" class="contact-icon" alt="" />
                <div class="details">
                    <h4>Email</h4>
                    <a href="mailto:brunnerhotel@gmail.com">brunnerhotel@gmail.com</a>
                    <a href="mailto:sales@brunner.hotel">sales@brunner.hotel</a>
                </div>
            </div>
            <div class="info-box">
                <img src="images/call.png" class="contact-icon" alt="" />
                <div class="details">
                    <h4>Call</h4>
                    <a href="tel:+254712345678">0712345678</a><br>
                    <a href="tel:+254787654321">0712345678</a>
                </div>
            </div>
        </div>
    </div>


    <script src="./assets/script.js"></script>
</body>

</html>