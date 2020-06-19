<?php
    session_start();
    if(!isset($_SESSION['logged_in'])){

print <<< HTML

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GRA HARDWARE UNIT</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="js/bootstrap.min.js">
    <link rel="stylesheet" href="css/custom.css">
</head>
<body>
<div id="container">
    <div id="nav-bar" class="navbar navbar-default  navbar-inverse">
        <div class="nav-title  margin">
            <a href="index.php"><h2>GRA LOGIN</h2 ></a>
        </div>
        <div  id="login-btn" class=" float-right" >
            <a href="index.php">
                   <span class="glyphicon glyphicon-user" > </span> 
                Login/Register
            </a>
        </div>
  </div>      
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/respond.js"></script>
    <script src="js/bootstrap.min.js"></script>
HTML;

    }else{

        print <<< HTML
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GRA</title>
    <link rel="stylesheet" href="css/custom.css">
</head>
<body>
<div id="container">
    <div id="nav-bar" class="navbar navbar-default  navbar-inverse">
        <div class="nav-title  margin">
            <a href="index.php"><h2>GRA HARDWARE UNIT</h2></a>
        </div>
        <div id="login-btn" class=" float-right">
            <a href="user.php">Admin Panel</a>
            <a  href="logout.php"> 
                LogOut
            </a>
        </div>
    </div>
</div>
    <script src="js/jquery.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/respond.js"></script>
    <script src="js/bootstrap.min.js"></script>
HTML;
    
    }
?>