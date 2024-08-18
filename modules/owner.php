<?php

switch($vars['action']){

    
   case "owner_profile":{if($_COOKIE['isowner']==1){
    $owner= $db->query('SELECT * FROM theowner ')->fetchAll();
  

 }else{
    $owner = $db->query('SELECT * FROM monitor where email=? and pass=?',$_COOKIE['app_email'],$_COOKIE['app_pass'])->fetchAll();


 }

     $items = $db->query('SELECT * FROM theowner ')->fetchAll();
     $driving_school = $db->query ('SELECT * FROM driving_school ')->fetchAll();
     
     include("view/OwnerProfile.php");

        exit;

    }break;


    

    
}

?>