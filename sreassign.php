<?php

    include_once 'header.php';
include_once 'functions.php';
include_once 'connect.php';


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


$con = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);

    // mysqli_connect("localhost:3306", "root" ,"", 'gra') or die("Error connecting to database:".mysql_error());

    // mysql_select_db("gra") or die(mysql_error());

?>
<?php
    $query = $_GET['query'];
    // gets value sent over search form

    $min_length = 3;
    // you can set minimum length of the query if you want

    if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then

        $query = htmlspecialchars($query);
        // changes characters used in html to their equivalents, for example: < to &gt;

        $query = mysqli_real_escape_string($con,$query);
        // makes sure nobody uses SQL injection

        $raw_results = mysqli_query($con,"SELECT * FROM it_equipment_reassignment_form
            WHERE (`Division` LIKE '%".$query."%') OR (`Department` LIKE '%".$query."%')") or die(mysql_error());



        if(mysqli_num_rows($raw_results) > 0){ 
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

            while($results = mysqli_fetch_array($raw_results)){
            // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop



    echo '<tr><a href="#">';

    echo '<td>'.$results['id']."</td>";
    echo '<td><a href="/equipment_allocation.php?equipment='.$results['id'].'">'.$results['Equipment']."</a></td>";
    echo "<td>".$results['Brand_Model']."</td>";
    echo "<td>".$results['Serial_Number']."</td>";
    echo "<td>".$results['Remarks']."</td>";
    echo "<td>".$results['Division']."</td>";
    echo "<td>".$results['Department']."</td>";
    echo "<td>".$results['Unit']."</td>";
    echo "<td>".$results['Region']."</td>";
    echo "<td>".$results['District']."</td>";
    echo "<td>".$results['Officer_Assigned']."</td>";
    echo "<td>".$results['Recieving_Officer']."</td>";
    echo "<td>".$results['Date_Recieved']."</td>";
    echo "<td>".$results['Authorised_By']."</td>";
    echo "<td>".$results['Approved_Date']."</td>";
    echo "<td>".$results['Approved_by']."</td>";
    echo "</a></tr>";


                // posts results gotten from database(title and text) you can also show id ($results['id'])
            }
echo"</table>";
        }
        else{ // if there is no matching rows do following
            echo " sorry No results for searched item";
        }

    }
    else{ // if query length is less than minimum
        echo "Minimum length is ".$min_length;
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