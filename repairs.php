<?php
$con=mysqli_connect ('localhost:3306','root','','gra');
$staff_name=$_POST["staff_name"];
$room_number=$_POST["room_number"];
$department=$_POST["department"];
$date_recieved=$_POST["date_recieved"];
$staff_rank=$_POST["staff_rank"];
$office_phone=$_POST["office_phone"];
$model=$_POST["model"];
$serial=$_POST["serial"];
$complaint=$_POST["complaint"];
$item=$_POST["item"];
$serial_number=$_POST["serial_number"];
$recieving_officer=$_POST["recieving_officer"];
$date_item_recieved=$_POST["date_item_recieved"];
$job_undertaken_by=$_POST["job_undertaken_by"];
$worker_rank=$_POST["worker_rank"];
$nature_of_problem=$_POST["nature_of_problem"];
$action_taken=$_POST["action_taken"];
$remarks=$_POST["remarks"];
$supervisor_name=$_POST["supervisor_name"];
$supervisor_rank=$_POST["supervisor_rank"];
$date_of_completion=$_POST["date_of_completion"];



$sql="INSERT INTO repairs_maintenance_request_form (staff_name, room_number, department, date_recieved, staff_rank, office_phone, model, `serial`, complaint, item, serial_number, recieving_officer, date_item_recieved, job_undertaken_by, worker_rank,nature_of_Problem, action_taken, remarks, supervisor_name, supervisor_rank, date_of_completion) VALUES ('$staff_name','$room_number','$department','$date_recieved','$staff_rank','$office_phone','$model','$serial','$complaint','$item','$serial_number','$recieving_officer','$date_item_recieved','$job_undertaken_by','$worker_rank','$nature_of_problem','$action_taken','$remarks','$supervisor_name','$supervisor_rank','$date_of_completion')";

$results=mysqli_query($con,$sql);

if ($results){
	header("Location:rep.php");
}
else
{
	echo "error:".$sql.mysqli_error($con); 
}	
mysqli_close($con);
?>
