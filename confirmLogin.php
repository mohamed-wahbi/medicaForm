<?php
session_start();
include_once("connexion.php");
$emailADMIN = $_POST['email'];
$passADMIN = $_POST['password'];
$sel = "SELECT * FROM admin WHERE email='$emailADMIN' and passw='$passADMIN'";
$req = mysqli_query($con,$sel);
if (mysqli_num_rows($req)==1){
    $_SESSION["passADMIN"]=$_POST['passADMIN'];
    header("location:admin.php");
}
else {
    header("location:login.php");
}

?>