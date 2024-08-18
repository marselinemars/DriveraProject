<?php

include("../init.php");



 
  
  $theID=$_POST['class_id'];



  if (!empty($_POST['students'])){

    $added_students = $_POST['students'];
    
  foreach($added_students as $student )
  {

    $db->query("insert into `enrollement`(`StudentID`,`ScheduleID`, `attendance` ) VALUES ( ?, ?,'absent') " ,$student, $theID  );
    $db->query("UPDATE `student` SET scheduled='true' WHERE IDS = ? " ,  $student );


  }

  }




  // Return a response if needed
  $response = array('message' => 'Processing successful 2');
  echo json_encode($response);

?>