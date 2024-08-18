<?php                
require 'database_connection.php'; 
$event_name = $_POST['event_name'];
$event_start_date = date("Y-m-d H:i", strtotime($_POST['event_start_date']));
$event_monitor = $_POST['event_monitor'];
$event_type = $_POST['event_type'];
$event_vehicle= $_POST['event_vehicle'];
$event_category = $_POST['event_category'];
$event_hours= $_POST['event_hours'];




$insert_query = "insert into `schedule`(`name`,`Date` ,`MonitorID`,`VehicleID`,`Type`, `CategoryID` , `num_hours` ) values ('".$event_name."','".$event_start_date."','".$event_monitor."','".$event_vehicle."','".$event_type."','".$event_category."','".$event_hours."')";  

if(mysqli_query($con, $insert_query))
{
	$data = array(
                'status' => true,
                'msg' => 'class added successfully!'
            );
}
else
{
	$data = array(
                'status' => false,
                'msg' => $insert_query 			
            );
}
echo json_encode($data);	







?>
