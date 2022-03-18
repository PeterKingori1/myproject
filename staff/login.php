<?php
session_start();
$errorMessage;


$server_connect = mysqli_connect('localhost', 'root' , "" ,"brunner") or die("Error establishing a connection to the
server");

if (isset($_POST['login'])) {

    $email    = $_POST['email'];
    $password = $_POST['password'];

    $loginQuery  = "SELECT * FROM staff WHERE email = '$email' AND password = '$password' ";
    $loginResult = mysqli_query($server_connect, $loginQuery);
    $row         = mysqli_fetch_assoc($loginResult);

    if (mysqli_num_rows($loginResult) == 1) {
        $_SESSION['first_name'] = $row['first_name'];
        $_SESSION['last_name']  = $row['last_name'];
        $_SESSION['staff_id']  = $row['staff_id'];

        if ($row['type'] == "admin") {
            $_SESSION['first_name'] = $row['first_name'];
            $_SESSION['staff_type'] = 'admin';
             $_SESSION['staff_id'] = $row['staff_id'];
           header("location:index.php");
        } else {
            $_SESSION['staff_type'] = "staff";
              header("location:index.php");
        }

    } else {
       $errorMessage = "Error logging in. Please try again";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/login.css">
    <title>Brunner | login</title>
</head>

<body>
    <h1>Please login to continue</h1>

    <?php if(!empty($errorMessage)):  ?>
    <div class="error-message">
        <?= $errorMessage ?>
    </div>
    <?php endif ?>

    <div class="main-container">

        <div class="image-container">
            <img src="../images2/pexels-michael-block-3225531.jpg" alt="inventory-pic" loading="lazy">
        </div>

        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <input type="text" placeholder="Email" name="email">
            <input type="password" placeholder="Password" name="password">
            <button class="login-button" name="login">Login</button>

        </form>

    </div>
</body>

</html>