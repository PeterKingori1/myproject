<?php
session_start();


$server_connect = mysqli_connect('localhost', 'root' , "" ,"brunner") or die("Error establishing a connection to the
server");




if(empty($_SESSION["staff_type"])){
header("location:login.php");
}

?>