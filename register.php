<?php
include_once 'header.php';
include_once 'functions.php';

$register_error = "";

if(isset($_POST['register'])){
    if(!empty($_POST['name']) && !empty($_POST['pass1']) && !empty($_POST['pass2']) ){

        $name = sanitizeString($_POST['name']);

        $name_result = queryMysql("SELECT * FROM `clients` WHERE `name` = '$name'");
        if($name_result->num_rows){
            $register_error .= "User already exists";
        }
        else{
            if($_POST['pass1'] === $_POST['pass2']){
                $password = encodePassword($_POST['pass1']);

                $register_result = queryMysql("INSERT INTO `clients`(`name`, `password`) VALUES ('$name', '$password')");
                $user_id = mysqli_insert_id($connection);
                $register_error .= "Successful";
                header('refresh: 2,url=index.php');
            
                
            }
            else{
                $register_error .= "Passwords aren't the same";
            }
        }
    }
    else{
        $register_error .= "Please fill all the fields";
    }

}
?>



<div class="container">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
         <div id="register" class="login-panel panel panel-default">
                                    <div class="panel-heading">
                            <h3 class="panel-title">Please Enter Your Credentials</h3>
                        </div>
            <form method="post" action="register.php">
                <p>Name</p>
                <input class="form-control" type="text" name="name" value="" placeholder=" Michael">
                <p>Password</p>
                <input  class="form-control" type="password" name="pass1" value="">
                <p>Repeat Password</p>
                <input class="form-control" type="password" name="pass2" value=""><br></br>
                <input class="btn btn-primary btn-block " type="submit" name="register" value="Register">
            </form>
            <div id="sign-up" class="text-center small-margin-top">
                <p>
                    Already a Member?
                    <a href="index.php" class="btn btn-primsry btn-sm">LogIn</a>
                </p>
                <p class="error"><?php echo $register_error; ?></p>
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