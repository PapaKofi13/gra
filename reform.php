<?php

	if(isset($_GET['equipment'])){
		include_once 'functions.php';
		$con = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);

		$equipment = sanitizeString($_GET['equipment']);
		$query = "SELECT * FROM it_equipment_return_form WHERE `id`=".$equipment." LIMIT 1";
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

						<h2 class="page-title"> Repairs </h2>
								<form action="srepairs.php" method="GET">
    <input type="text" name="query" />
    <input type="submit" value="Search" />
</form>
		

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Please fill the fields below</div>
									<div class="panel-body">
										<form action="repairs.php" method="POST" name="gra">
											<fieldset>
                                    <div class="form-group">
									<table border="0" width="100%" cellspacing="7">
									<tr>
									<legend> For Staff</legend>
									<td> Name</td> <td><input type="text" name="staff_name" id="staff_name" placeholder="kwame" class="form-control" value="<?php if (isset($result)){echo $result['staff_name'];}?>" /></td>
									<td> Room Number </td> <td><input type="Text" name="room_number" id="room_number" placeholder="" class="form-control" value="<?php if (isset($result)){echo $result['Room_number'];}?>" /></td>
									<td> Department </td> <td><input type="text" name="department" id="department" placeholder="general" class="form-control" value="<?php if (isset($result)){echo $result['department'];}?>" /></td>
									</tr>
									<tr>
									<td> Date Recieved </td> <td><input type="Date" name="date_recieved" id="date_recieved" placeholder="32" class="form-control" value="<?php if (isset($result)){echo $result['date_recieved'];}?>" /></td>
									<td> Staff Rank </td> <td><input type="text" name="staff_Rank" id="staff_Rank" placeholder="sto" class="form-control" value="<?php if (isset($result)){echo $result['staff_Rank'];}?>" /></td>
									<td> Office Phone Number </td> <td><input type="text" name="office_phone" id="office_phone" placeholder="sto" class="form-control" value="<?php if (isset($result)){echo $result['office_phone'];}?>" /></td>
									</tr>
									</table>
									Item :<br>
                                    <input class="form-control" type="text" name="item" placeholder="printer" id="item" value="<?php if (isset($result)){echo $result['item'];}?>"><br>
                                    Model : <br>
                                    <input class="form-control" type="text" placeholder="acer" id="model" name="model" value="<?php if (isset($result)){echo $result['model'];}?>" ></br>
                                    Serial Number: <br>
                                    <input class="form-control" name="serial" id="serial" placeholder="A5c7aa" type="text" value="<?php if (isset($result)){echo $result['serial'];}?>" ></br>
                                    Complaint:<br>
                                    <input class="form-control" placeholder=" stopped working" type="text area" name="complaint" id="complaint" value="<?php if (isset($result)){echo $result['complaint'];}?>" ><br>
									</fieldset><br />
									</br>

									<table border="0" width="100%" cellspacing="7">
									<tr>
									<legend> For IT Department Use Only</legend>
									<td> Item </td> <td><input type="text" name="item" id="item" placeholder="monitor" class="form-control" value="<?php if (isset($result)){echo $result['item'];}?>" /></td>
									<td> Serial Number </td> <td><input type="text" name="serial_number" id="serial_number" placeholder="" class="form-control" value="<?php if (isset($result)){echo $result['serial_number'];}?>" /></td>
									<td> Recieving Officer </td> <td><input type="text" name="recieving_officer" id="recieving_officer" placeholder="papa" class="form-control" value="<?php if (isset($result)){echo $result['recieving_officer'];}?>" /></td>
									</tr>
									<tr>
									<td> Date </td> <td><input type="Date" name="date_item_recieved" id="date_item_recieved" placeholder="" class="form-control" value="<?php if (isset($result)){echo $result['date_item_recieved'];}?>" /></td>
									<td> Job Undertaken By </td> <td><input type="text" name="job_undertaken_by" id="job_undertaken_by" placeholder="sto" class="form-control" value="<?php if (isset($result)){echo $result['job_undertaken_by'];}?>" /></td>
									<td> Rank </td> <td><input type="text" name="worker_rank" id="worker_rank" placeholder="manager" class="form-control" value="<?php if (isset($result)){echo $result['worker_rank'];}?>" /></td>
									</tr>
									</table></br>
									Nature Of Problem: <br>
                                    <input class="form-control" name="nature_of_problem" id="nature_of_problem" placeholder="virus" type="text" value="<?php if (isset($result)){echo $result['nature_of_problem'];}?>" ></br>
                                    Action Taken:<br>
                                    <input class="form-control" placeholder=" Formated " type="text" name="action_taken" id="action_taken" value="<?php if (isset($result)){echo $result['action_taken'];}?>" ><br>
                                    Remarks:<br>
                                    <input class="form-control" placeholder="trojan virus " type="text" name="remarks" id="remarks" value="<?php if (isset($result)){echo $result['remarks'];}?>" ><br>
									<tr>
									<legend> Supervisor </legend>
									<td> Name </td> <td><input type="text" name="supervisor_name" id="supervisor_name" placeholder="bob" class="form-control" value="<?php if (isset($result)){echo $result['supervisor_name'];}?>" /></td>
									<td> Rank </td> <td><input type="text" name="supervisor_rank" id="supervisor_rank" placeholder="head" class="form-control" value="<?php if (isset($result)){echo $result['supervisor_rank'];}?>" /></td>
									<td> Date Of completion </td> <td><input type="date" name="date_of_completion" id="date_of_completion" placeholder="" class="form-control" value="<?php if (isset($result)){echo $result['date_of_completion'];}?>" /></td>
									</tr>
									</fieldset>
									</br>
									</fieldset><br />
									</br>
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

	</script>

</body>

</html>