<?php

include("../init.php");



 
  
  $theID= $_POST['class_id'];

  
  $selectedNames = $_POST['values'];

  $db->query("UPDATE `enrollement` SET attendance='absent' WHERE ScheduleID = ? " , $theID  );
  $db->query("UPDATE `student` JOIN `enrollement` ON student.IDS= enrollement.StudentID SET student.scheduled='false' WHERE enrollement.ScheduleID = ?" , $theID );

  
  

  
  $class_info = $db->query("SELECT * FROM `schedule`WHERE ScheduleID=?" , $theID  )->fetchAll() [0];
  
  $class_category = $class_info['CategoryID'];

  $category_info = $db->query("SELECT * FROM `category`WHERE CategoryID =?" , $class_category)->fetchAll()[0];

  $updated_info = update_progress_info($category_info,$class_info) ;

  
  print_r ($updated_info);

  if (!empty($_POST['values'])){

    $selectedNames = $_POST['values'];
    
  foreach($selectedNames as $value )
  {

    $db->query("UPDATE `enrollement` SET attendance='present' WHERE ScheduleID = ? AND StudentID = ? " , $theID , $value );
    $db->query("UPDATE `student` SET Stage=? , NumOfAttendantHours=? WHERE IDS = ?  " , $updated_info['stage'], $updated_info['hours'], $value );
    
    
  }

  }


  function update_progress_info( $category_info,$class_info){

    $updated_info= array ('stage'=> '', 'hours'=> '0');
    $hours_studied=$class_info['num_hours']+1;

    
    switch ($class_info['Type']){

      

      case "Theoretical":{
       
        
      if ($hours_studied==$category_info['NumHoursTheoretical'])
      {
        $updated_info['stage'] = "Practical Type 1" ;
        $updated_info['hours'] = 0 ;
      }
      else {


        $updated_info['stage'] = "Theoretical" ;
        $updated_info['hours'] = $hours_studied ;

      }
  
        
    }break;

    
 

    case "Practical Type 1":{
       
        
      if ($hours_studied==$category_info['NumHoursPractical1'])
      {
        $updated_info['stage'] = "Practical Type 2" ;
        $updated_info['hours'] = 0 ;
      }
      else {

        $updated_info['stage'] = "Practical Type 1" ;
        $updated_info['hours'] = $hours_studied ;

      }
    
        
    }break;

    case "Practical Type 2":{
       
        
      if ($hours_studied==$category_info['NumHoursPractical2'])
      {

      }
      else {

        $updated_info['stage'] = "Practical Type 2" ;
        $updated_info['hours'] = $hours_studied ;

      }
    
        
    }break;



    }


    
    return $updated_info;

  }

  // Return a response if needed
  $response = array('message' => 'Processing successful');
  echo json_encode($response);

?>