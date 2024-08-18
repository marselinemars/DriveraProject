<?php                
require 'database_connection.php'; 
$display_query = "select ScheduleID ,name,Date from schedule";             
$results = mysqli_query($con,$display_query);   
$count = mysqli_num_rows($results);  
if($count>0) 
{
	$data_arr=array();
    $i=1;
	while($data_row = mysqli_fetch_array($results, MYSQLI_ASSOC))
	{	
	$data_arr[$i]['event_id'] = $data_row['ScheduleID'];
	$data_arr[$i]['title'] = $data_row['name'];
	$data_arr[$i]['start'] = $data_row['Date'];
	$data_arr[$i]['color'] = '#'.substr(uniqid(),-6); // 'green'; pass colour name
	$data_arr[$i]['url'] = 'index.php?action=manage_class&id='.$data_row['ScheduleID'];
	$i++;
	}
	
	$data = array(
                'status' => true,
                'msg' => 'successfully!',
				'data' => $data_arr
            );
}
else
{
	$data = array(
                'status' => false,
                'msg' => 'Error!'				
            );
}
echo json_encode($data);
?>