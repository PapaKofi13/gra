<?php
include_once 'header.php';
include_once 'functions.php';
$login_error = '';

require_once 'connect.php';
$connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);
if ($connection->connect_error) die ($connection->connect_error);
if (isset($_POST['login'])) {
    if (!empty($_POST['name']) && !empty($_POST['password'])) {

        $name = sanitizeString($_POST['name']);
        $password = encodePassword($_POST['password']);

        $login_result = queryMysql("SELECT * FROM `clients` WHERE `name` = '$name' AND `password` = '$password'");

        if ($login_result->num_rows) {
            $row = $login_result->fetch_array(MYSQL_ASSOC);
            if ($name == $row['Name'] && $password == $row['Password']) {
                session_start();
                $_SESSION['Name'] = $row['Name'];
                $_SESSION['logged_in'] = true;
                mysqli_close($connection);
                header('Location:user.php');
            }
        } else {
            $login_error .= "Incorrect Email/Password, Try Again";
        }
    } else {
        $login_error .= "Please Enter Credentials to LogIn";
    }
}
?>

<div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
         <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Please Login In</h3>
                        </div>
                        <div class="panel-body">
           <form method="post" action="">
                Name : <br>
                <input class="form-control" type="text"  name="name" value="" placeholder="Name">
                Password : <br>
               <input class="form-control" type="password" name="password" value="">
                <br></br>
                 <button class="btn btn-success btn-block"  type="submit" name="login" value="Login" > login </button> 
                     <p>
                     <br>
                  Don't have an account?? <span class="glyphicon glyphicon-hand-right"  > </span>
                   <span class="glyphicon glyphicon-arrow-right"  > </span> <span class="glyphicon glyphicon-chevron-right"  > </span>
                   <a href="register.php" class="btn btn-lg btn-warning btn block" type="button"> Sign Up </a>
                  </p>
                   <p class="error"><?php echo $login_error; ?></p>
            </form>
            </div>
          <div id="sign-up" class="text-right">

          </div>
        </div>
     </div>
  </div>
</div>
</body>
    <footer>
        <div id="footer">
        &copy;2016 GRA I.T INTERNS . &nbsp; &nbsp; NLA Building Accra &nbsp; &nbsp;
        </div>
    </footer>
</html>
