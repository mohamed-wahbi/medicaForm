<?php
session_start();
include_once('connexion.php');
$mesg="";
if(isset($_POST['enter'])){

    $email=mysqli_real_escape_string($con,$_POST['email']);
    $password=mysqli_real_escape_string($con,$_POST['password']);
    $sql=mysqli_query($con,"select * from admin where email='$email' && passw='$password'");
    $num=mysqli_num_rows($sql);
    if($num>0){
        $row=mysqli_fetch_assoc($sql);
        $_SESSION['USER_ID']=$row['id'];
        $_SESSION['USER_EMAIL']=$row['email'];
        $_SESSION['USER_PASS']=$row['passw'];
        
        header("location:admin.php");
    }else{
            $mesg = "email ou password incorrecte !";
    }


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Document</title>
</head>
<body>

    <section class="formContent">
        <div class="form">
            <form action="" method="POST">
                <div class="logo">
                    <img src="./imges/logo.png" alt="logo du site...">
                </div>
                <div class="emailContent">
                    <label for="email">E-mail :</label>
                    <input type="email" name="email" placeholder="E-mail" required class="input">
                </div>
                <div class="passwordContent">
                    <label for="password">Mot de passe :</label>
                    <input type="password" name="password" placeholder="Mot de passe" required class="input">
                </div>
                <div class="error">
                    <?php echo $mesg?>
                </div>
                    
                
                <div class="btn">
                    <input type="submit" value="Identifier" name="enter">
                </div> 
                
            </form>
        </div>
    </section>
</body>
</html>
