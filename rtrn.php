<?php
$con=mysqli_connect ('localhost:3306','root','','gra');
$equipment=$_POST["equipment"];
$brand_model=$_POST["brand_model"];
$serial_number=$_POST["serial_number"];
$remarks=$_POST["remarks"];
$division=$_POST["division"];
$department=$_POST["department"];
$unit=$_POST["unit"];
$region=$_POST["region"];
$district=$_POST["district"];
$recieving_officer=$_POST["recieving_officer"];
$date_recieved=$_POST["date_recieved"];
$authorised_by=$_POST["authorised_by"];
$approved_date=$_POST["approved_date"];
$approved_by=$_POST["approved_by"];



$sql="INSERT INTO it_equipment_return_form (equipment,brand_model,serial_number,remarks, division, department, unit, region, district ,recieving_officer, date_recieved,authorised_by, approved_date,approved_by) Values ('$equipment','$brand_model','$serial_number','$remarks','$division','$department','$unit','$region','$district','$recieving_officer','$date_recieved','$authorised_by','$approved_date','$approved_by')";

$results=mysqli_query($con,$sql);

if ($results){
	header("Location:returnf.php");
}
else
{
	echo "error:".$sql.mysqli_error($con); 
}	
mysqli_close($con);
?>
