<?php

switch($vars['action']){

    
   case "show_calendar":{

      if($_COOKIE['isowner']==1){
         $owner= $db->query('SELECT * FROM theowner ')->fetchAll();
       

      }else{
         $owner = $db->query('SELECT * FROM monitor where email=? and pass=?',$_COOKIE['app_email'],$_COOKIE['app_pass'])->fetchAll();


      }
      
     $monitors = $db->query('SELECT * FROM monitor ')->fetchAll();
     $vehicles = $db->query('SELECT * FROM vehicle ')->fetchAll();
     $students = $db->query('SELECT * FROM student ')->fetchAll();
     $categories = $db->query('SELECT * FROM category WHERE isActive=1 ')->fetchAll();
     
     
     include("view/calendar.php");

        exit;

    }break;


    

    case "manage_class":{

      $class_id = $vars['id'];

      $class_info = $db->query('SELECT * FROM schedule  WHERE ScheduleID=?',$class_id)->fetchAll();
      
      $class_category=$class_info[0]['CategoryID'];
      $class_type=$class_info[0]['Type'];
      $class_hours=$class_info[0]['num_hours'];

      $students = $db->query('SELECT s.fname , s.lname , s.IDS FROM enrollement e INNER JOIN student s ON s.IDS = e.StudentID WHERE ScheduleID=?',$class_id)->fetchAll();
      
      $students_to_add = $db->query('SELECT fname , lname , IDS FROM student WHERE Stage = ? AND NumOfAttendantHours =? AND CategoryID = ? AND scheduled = "false" ',$class_type,$class_hours,$class_category)->fetchAll();
      
      include("view/class.php");
 
         exit;
 
     }break;


    

    
}

?>