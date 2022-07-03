<?php
$login_alert= false;
$InvalidLogin = false;
$Empty = false;
require 'dbconnect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    //require 'display/_dbconnect.php';
    $email = $_POST['email'];
    $password = $_POST['password'];
    {
        $sql = "Select * from signindata where email='$email' and password='$password'";
        $result = mysqli_query($conn, $sql);

        $num = mysqli_num_rows($result);

        if($num == 1){
            $login_alert = true;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email;
            header("location: login page.php");

            //header("location: /practice/index.php");            
        }
        else{
          if(empty($_POST['email']) || empty($_POST['password']))
          {
            $Empty = true;
          }
          else{
            $InvalidLogin = true;
          }
            
        }
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buddies - log in or sign up</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Buddies</h1>
    <h2>Buddies helps you connect and share <br> with the people in your life.</h2>
    <?php
        /*if($login_alert){
            echo '<p class="text"> Welcome, '. $_SESSION['email'];
        }*/
        ?>
    <div class="sign-up-form">
    <form action="/Buddies/index.php" method="post">
        <input type="email" class="input-box" placeholder="Email Address" name="email" required>
        <input type="password" class="input-box" placeholder="Password" name="password" required>
        <?php
        if($login_alert){
            echo "You are Logged in";
        }
        ?>
        <?php
        if($InvalidLogin){
            echo "Invalid Email or Password";
        }
        ?>
        <?php
        if($Empty){
            echo "Enter Email or Password";
        }
        ?>



        <button class="signup-btn">Login</button>
        <div class="pass"><a href="Forgotten Password.php">Forgotten Password?</a></div>
        <hr>
        <button class="create-btn"><a style="color: white;" href="Sign_Up_Page.php">Create New Account</a></button>
        
        </form>
    </div>
</body>
</html>