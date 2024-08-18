<?php
switch($vars['action']){

    
    case "succ_students":{if($_COOKIE['isowner']==1){
        $owner= $db->query('SELECT * FROM theowner ')->fetchAll();
      

     }else{
        $owner = $db->query('SELECT * FROM monitor where email=? and pass=?',$_COOKIE['app_email'],$_COOKIE['app_pass'])->fetchAll();


     }

         $items = $db->query('SELECT * FROM succ_students')->fetchAll();
         
         include("view/succ_students.php");

         insertSuccStudents();
         header("location: index.php?action=succ_students");
        
         exit;
     }break;
    }
?>