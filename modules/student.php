<?php

switch($vars['action']){

    
   case "list_student":{if($_COOKIE['isowner']==1){
    $owner= $db->query('SELECT * FROM theowner ')->fetchAll();
  

 }else{
    $owner = $db->query('SELECT * FROM monitor where email=? and pass=?',$_COOKIE['app_email'],$_COOKIE['app_pass'])->fetchAll();


 }
        $items = $db->query('SELECT * FROM student')->fetchAll();
        
        
        include("view/students.php");

        exit;
    }break;



    case "add_student":{if($_COOKIE['isowner']==1){
        $owner= $db->query('SELECT * FROM theowner ')->fetchAll();
      

     }else{
        $owner = $db->query('SELECT * FROM monitor where email=? and pass=?',$_COOKIE['app_email'],$_COOKIE['app_pass'])->fetchAll();


     }
        // Fetch activated categories from the database
        include("view/addstudent.php");
        exit;        
        
    }break;
    
    case "do_add_student":{

        $ret=student_add($vars);

       print_r($ret); 
        if ($ret['status']==1){

           header("location: index.php?action=list_student"); 

        }else{
           
           header("location: index.php?action=add_student&error_message=".urlencode($ret['error']));
       

       }

        exit;        
    }break;
    case "edit_student":{if($_COOKIE['isowner']==1){
        $owner= $db->query('SELECT * FROM theowner ')->fetchAll();
      

     }else{
        $owner = $db->query('SELECT * FROM monitor where email=? and pass=?',$_COOKIE['app_email'],$_COOKIE['app_pass'])->fetchAll();


     }
        $idstudent = $_GET["idstudent"] ;
        
        include("view/edit_student.php");
        exit;        
        
    }break;
    
    case "do_edit_student":{

       
        $idstudent = $_GET["idstudent"] ;
        $ret=student_edit($_POST);

        print_r($ret); 
         if ($ret['status']==1){
 
            header("location: index.php?action=list_student"); 
 
         }else{
            
            header("location: index.php?action=edit_student&error_message=".urlencode($ret['error']));
        
 
        }
 

        exit;        
    }break;
    case "student_delete":{
        $idstudent = $_GET["idstudent"] ;
        student_delete();
        header("location: index.php?action=list_student"); 


        exit;
    }break;
    case "student_profile":{
        if($_COOKIE['isowner']==1){
            $owner= $db->query('SELECT * FROM theowner ')->fetchAll();
          
   
         }else{
            $owner = $db->query('SELECT * FROM monitor where email=? and pass=?',$_COOKIE['app_email'],$_COOKIE['app_pass'])->fetchAll();
   
   
         }
        $student_rows = $db->query('SELECT * FROM student ')->fetchAll();
        $row = $_GET["row"] ;
   
        include("view/student_profile.php");
   
           exit;
   
       }break;

    
}

?>