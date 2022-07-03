<?php
$alert= false;
$error1= false;
$errorp= false;

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    require 'dbconnect.php';
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
    $email = $_POST['email'];
    $m_number = $_POST['m_number'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    //$exists = false;

    $present = "SELECT * FROM `signindata` WHERE email = '$email'";
    $res = mysqli_query($conn, $present);
    $num = mysqli_num_rows($res);
    if($num > 0){
      //$error = "Email alredy exists in database";
      $error1 = true;
    }
    else{
      if($password == $cpassword){
        $sql = "INSERT INTO `signindata` (`fname`, `lname`, `email`,  `m_number`, `password`) VALUES ('$fname', '$lname', '$email', '$m_number', '$password')";
        $res = mysqli_query($conn, $sql);
        if($res){
            $alert= true;
        }
      }
      else{
        $errorp = true;
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
    <title>Sign Up for Buddies | Buddies</title>
    <link rel="stylesheet" href="css/form.css">
</head>
<body>
    <div class="container">
        <form action="/Buddies/Sign_Up_Page.php" method="post" enctype="multipart/form"> 
            <h1>Create a new account</h1>
            <h2>It's quick and easy.</h2>
            <?php
            if($error1)
                echo '<p class="">Email alredy exists in database</p>';
            ?>
            <?php
            if($alert)
                echo '<p class="">Account Created Successfully Click <a class="" href="/Buddies/index.php">here</a></p>';
            ?>
            <?php
            if($errorp)
                echo '<p class="">Password not matched</p>';
            ?>
            <hr>
            <input type="text" class="input-box" placeholder="First Name" name="fname" required>
            <input type="text" class="input-box" placeholder="Surname" name="lname" required>
            <input type="email" class="input-box" placeholder="Email Address" name="email" required>
            <input type="number" class="input-box" placeholder="Mobile Number" name="m_number" required>
            <input type="password" class="input-box" placeholder="New Password" name="password" required>
            <input type="password" class="input-box" placeholder="Confirm Password" name="cpassword" required>
            <p>By clicking Sign Up, you agree to our Terms, Data Policy and Cookie Policy.</p>
            <button class="signup-btn">Sign Up</button>
        </form>
    </div>
</body>
</html>