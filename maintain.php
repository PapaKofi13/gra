<?php
include_once 'header.php';
include_once 'functions.php';


print <<< HTML
<div id="table">

<!doctype html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="theme-color" content="#3e454c">
    
    <title>GRA IT DEPARTMENT PORTAL -- HARDWARE UNIT</title>

    <!-- Font awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Sandstone Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap Datatables -->
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    <!-- Bootstrap social button library -->
    <link rel="stylesheet" href="css/bootstrap-social.css">
    <!-- Bootstrap select -->
    <link rel="stylesheet" href="css/bootstrap-select.css">
    <!-- Bootstrap file input -->
    <link rel="stylesheet" href="css/fileinput.min.css">
    <!-- Awesome Bootstrap checkbox -->
    <link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
    <!-- Admin Stye -->
    <link rel="stylesheet" href="css/style.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <div class="brand clearfix">
        <a href="index.html" class="logo"><img src="img/logo.jpg" class="img-responsive" alt=""></a>
        <span class="menu-btn"><i class="fa fa-bars"></i></span>
        <ul class="ts-profile-nav">
            <li><a href="#">Help</a></li>
            <li><a href="#">Settings</a></li>
            <li class="ts-account">
                <a href="#"><img src="img/ts-avatar.jpg" class="ts-avatar hidden-side" alt=""> Account <i class="fa fa-angle-down hidden-side"></i></a>
                <ul>
                    <li><a href="#">My Account</a></li>
                    <li><a href="#">Edit Account</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>

    <div class="ts-main-content">
        <nav class="ts-sidebar">
            <ul class="ts-sidebar-menu">
                <li class="ts-label">Search</li>
                <li>
                    <input type="text" class="ts-sidebar-search" placeholder="Search here...">
                </li>
                <li class="ts-label"> Welcome </li>
                <li class="open"><a href="user.php"><i class="fa fa-dashboard"></i> HOME </a></li>
                <li><a href="equipment_allocation.php"><i class="fa fa-pie-chart"></i> Equpment Allocation </a></li>
                <li><a href="reassignment_form.php"><i class="fa fa-table"></i> Reassignment Form </a></li>
                <li><a href="equipment_return.php"><i class="fa fa-edit"></i> Equpment Retun Form</a></li>
                <li><a href="reform.php"><i class="fa fa-pie-chart"></i> Repairs and Maintenance </a></li>

                <!-- Account from above -->
                <ul class="ts-profile-nav">
                    <li><a href="#">Help</a></li>
                    <li><a href="#">Settings</a></li>
                    <li class="ts-account">
                        <a href="#"><img src="img/ts-avatar.jpg" class="ts-avatar hidden-side" alt=""> Account <i class="fa fa-angle-down hidden-side"></i></a>
                        <ul>
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">Edit Account</a></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>

            </ul>
        </nav>
        <div class="content-wrapper">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">

                        <h2 class="page-title">Welcome to GRA HARDWARE UNIT </h2>

                        <!-- Zero Configuration Table -->

HTML;


if (isset($_SESSION['logged_in'])){

    $hole_error = "";
    $name = $_SESSION['Name'];
    echo " Hello  ".$name." Welcome !!  Below are the list of clients with their encripted passwords .";

     $con=mysqli_connect ('localhost','root','','gra');
     $results=mysqli_query($con,"select * from it_equipment_allocation_form");
     echo "<table id='zctb' class='display table table-striped table-bordered table-hover' cellspacing='0' width='100%' >
        <tr>
            <th>id</th>
            <th>Equipment</th>
            <th>Brand_Model</th>
            <th>Serial_Number</th>
            <th>Remarks</th>
            <th>Division</th>
            <th>Department</th>
            <th>Unit</th>
            <th>Region</th>
            <th>District</th>
            <th>Officer_Assigned</th>
            <th>Recieving_Officer</th>
            <th>Date_Recieved</th>
            <th>Authorised_By</th>
            <th>Approved_Date</th>
            <th>Approved_by</th>
        </tr>";
while ($row=mysqli_fetch_array($results))
{
    echo "<tr>";
    echo "<td>".$row['id']."</td>";
    echo "<td>".$row['Equipment']."</td>";
    echo "<td>".$row['Brand_Model']."</td>";
    echo "<td>".$row['Serial_Number']."</td>";
    echo "<td>".$row['Remarks']."</td>";
    echo "<td>".$row['Division']."</td>";
    echo "<td>".$row['Department']."</td>";
    echo "<td>".$row['Unit']."</td>";
    echo "<td>".$row['Region']."</td>";
    echo "<td>".$row['District']."</td>";
    echo "<td>".$row['Officer_Assigned']."</td>";
    echo "<td>".$row['Recieving_Officer']."</td>";
    echo "<td>".$row['Date_Recieved']."</td>";
    echo "<td>".$row['Authorised_By']."</td>";
    echo "<td>".$row['Approved_Date']."</td>";
    echo "<td>".$row['Approved_by']."</td>";
    echo "</tr>";
}
echo"</table>";
mysqli_close($con);
}
else{
header('Location:index.php');
}
  
?>


                    </div>
                </div>

                <div class="row">
                    <div class="clearfix pt pb">
                        <div class="col-md-12">
                                    &copy;2016 GRA I.T INTERNS . &nbsp; &nbsp; NLA Building Accra &nbsp; &nbsp;
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Loading Scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap-select.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
    <script src="js/Chart.min.js"></script>
    <script src="js/fileinput.js"></script>
    <script src="js/chartData.js"></script>
    <script src="js/main.js"></script>
    

</body>

</html>

HTML;

?>
</div>
</div>
</div>

