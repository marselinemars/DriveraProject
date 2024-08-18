<?php
switch($vars['action']){

    
    case "failed_students":{if($_COOKIE['isowner']==1){
        $owner= $db->query('SELECT * FROM theowner ')->fetchAll();
      

     }else{
        $owner = $db->query('SELECT * FROM monitor where email=? and pass=?',$_COOKIE['app_email'],$_COOKIE['app_pass'])->fetchAll();


     }
         $items = $db->query('SELECT * FROM failed_students')->fetchAll();
         
         include("view/failed_students.php");

         insertFailedStudents();
         header("location: index.php?action=failed_students");
        
         exit;
     }break;
    }
?>