<?php
session_start();
$Welcome = false;

//if(isset($_SESSION['loggedin']) || $_SESSION['loggedin']=true)
{
    //header("location: login.php");
    //header("location: login.php");
    if(isset($_SESSION['email']))
    {
      $Welcome = true;
    }
    
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcom To Buddies</title>
    <link rel="stylesheet" href="css/loginpage.css">
</head>
<body>
    <nav>
        <a href="index.php">Buddies</a>
    </nav>
    <button><a href="index.php">Log Out</a></button>
    <?php
        if($Welcome){
            echo '<p class="text"> Welcome, '. $_SESSION['email'].'</p>';
        }
        ?>
</body>
</html>