<?php

	if(isset($_GET['equipment'])){
		include_once 'functions.php';
		$con = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);

		$equipment = sanitizeString($_GET['equipment']);
		$query = "SELECT * FROM it_equipment_allocation_form WHERE `id`=".$equipment." LIMIT 1";
		$raw_result = mysqli_query($con, $query);

		if (mysqli_num_rows($raw_result) > 0){
			$result = mysqli_fetch_array($raw_result);
		}
	}

?>




<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">

	<title>GRA</title>

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
                <li><a href="equipment_return.php"><i class="fa fa-edit"></i> Equpment Return Form</a></li>
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

						<h2 class="page-title"> IT Equipment Allocation Form</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Please fill the fields below</div>
									<div class="panel-body">
										<form action="info.php" method="POST" name="gra">
											<fieldset>
                                    <div class="form-group">
									<table border="0" width="100%" cellspacing="7">
									<tr>
									<legend> Hardware Details</legend>
									<td> Equipment</td> <td><input type="text" name="equipment" id="equipment" placeholder="System Unit" class="form-control" value="<?php if (isset($result)){echo $result['Equipment'];}?>" /></td>
									<td> Brand/Model</td> <td><input type="text" name="brand_model" id="brand_model" placeholder="Acer" class="form-control" value="<?php if (isset($result)){echo $result['Brand_Model'];}?>"/></td>
									</tr>
									<tr>
									<td> Serial number</td> <td><input type="text" name="serial_number" id="serial_number" placeholder="Z0oaPs" class="form-control" value="<?php if (isset($result)){echo $result['Serial_Number'];}?>"/></td>
									<td> Remarks</td> <td><input type="text" name="remarks" id="remarks" placeholder="Virus" class="form-control" value="<?php if (isset($result)){echo $result['Remarks'];}?>"/></td>
									<td> Division</td> <td><input type="text" name="division" id="division" placeholder="STO" class="form-control" value="<?php if (isset($result)){echo $result['Division'];}?>"/></td>
									</tr>
									</table>
									</fieldset> <br />
									<fieldset>
												</table>
                                                    <fieldset>
                                                        Department :<br>
                                                        <input class="form-control" type="text" name="department" placeholder="finance" id="department" value="<?php if (isset($result)){echo $result['Department'];}?>"><br>
                                                        Unit : <br>
                                                        <input class="form-control" type="text" placeholder="STO" id="unit" name="unit" value="<?php if (isset($result)){echo $result['Unit'];}?>"></br>
                                                        Region: <br>
                                                        <input class="form-control" name="region" id="region" placeholder="Accra" type="text" value="<?php if (isset($result)){echo $result['Region'];}?>"></br>
                                                        District:<br>
                                                        <input class="form-control" placeholder="Accra" type="text" name="district" id="district" value="<?php if (isset($result)){echo $result['District'];}?>"><br>
                                                        <legend>Assigned To:</legend>
                                                        Name Of Officer:<br>
                                                        <input class="form-control" placeholder="Bob" name="officer_assigned" type="text" id="officer_assigned" value="<?php if (isset($result)){echo $result['Officer_Assigned'];}?>"><br>
                                                        <legend> Authorised By </legend>
														Recieving Officer:<br>
                                                        <input class="form-control" placeholder="" type="text" name="recieving_officer" id="recieving_officer" value="<?php if (isset($result)){echo $result['Recieving_Officer'];}?>"><br>
                                                        Date Recieved :<br>
                                                        <input class="form-control" placeholder="" name="date_recieved" type="Date" id="date_recieved" value="<?php if (isset($result)){echo $result['Date_Recieved'];}?>"><br>
                                                        Authorised By :<br>
                                                        <input class="form-control" type="text" name="authorised_by" placeholder="Mr Sam" name="authorised_by" value="<?php if (isset($result)){echo $result['Authorised_By'];}?>"><br>
                                                        Approved Date:<br>
                                                        <input class="form-control" name="approved_date" type="Date" id="approved_date" value="<?php if (isset($result)){echo $result['Approved_Date'];}?>"></br>
                                                        Approved By:<br>
                                                        <input class="form-control" name="approved_by" type="text" id="approved_by" value="<?php if (isset($result)){echo $result['Approved_by'];}?>"></br>
                                                    </fieldset>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <div class="row-md-offset-2">
                                    <?php
                                    if (isset($result)){

                                    } else{
                                    	echo '<button class="btn btn-success btn-block"  type="submit" > Add </button>';
                                    }
                                    ?>

                                    <button class="btn btn-success btn-block " type="reset">Cancel</button>
                                    </div>

										</form>

									</div>
								</div>
							</div>
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

	<script>

	window.onload = function(){

		// Line chart from swirlData for dashReport
		var ctx = document.getElementById("dashReport").getContext("2d");
		window.myLine = new Chart(ctx).Line(swirlData, {
			responsive: true,
			scaleShowVerticalLines: false,
			scaleBeginAtZero : true,
			multiTooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
		});

		// Pie Chart from doughutData
		var doctx = document.getElementById("chart-area3").getContext("2d");
		window.myDoughnut = new Chart(doctx).Pie(doughnutData, {responsive : true});

		// Dougnut Chart from doughnutData
		var doctx = document.getElementById("chart-area4").getContext("2d");
		window.myDoughnut = new Chart(doctx).Doughnut(doughnutData, {responsive : true});

	}
	</script>

</body>

</html>