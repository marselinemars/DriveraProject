<?php

switch($vars['action']){

    
   case "list_vehicles":{

        $items = $db->query('SELECT * FROM vehicle')->fetchAll();
        if($_COOKIE['isowner']==1){
            $owner= $db->query('SELECT * FROM theowner ')->fetchAll();
          
   
         }else{
            $owner = $db->query('SELECT * FROM monitor where email=? and pass=?',$_COOKIE['app_email'],$_COOKIE['app_pass'])->fetchAll();
   
   
         }
        include("view/vehicles.php");

        exit;
    }break;



    case "add_vehicle":{if($_COOKIE['isowner']==1){
        $owner= $db->query('SELECT * FROM theowner ')->fetchAll();
      

     }else{
        $owner = $db->query('SELECT * FROM monitor where email=? and pass=?',$_COOKIE['app_email'],$_COOKIE['app_pass'])->fetchAll();


     }
        include("view/Addvehicle.php");
        exit;        
        
    }break;
    
    case "do_add_vehicle":{

        $ret=add_vehicle($vars);

       print_r($ret); 
        if ($ret['status']==1){

           header("location: index.php?action=list_vehicles"); 

        }else{
           
           header("location: index.php?action=add_vehicle&error_message=".urlencode($ret['error']));
       

       }

        exit;        
    }break;
    

    case "edit_vehicle":{if($_COOKIE['isowner']==1){
        $owner= $db->query('SELECT * FROM theowner ')->fetchAll();
      

     }else{
        $owner = $db->query('SELECT * FROM monitor where email=? and pass=?',$_COOKIE['app_email'],$_COOKIE['app_pass'])->fetchAll();


     }
        $idv = $_GET["idvehicle"];
        include("view/editvehicle.php");
        exit;        
        
    }break;
    
    case "do_edit_vehicle":{
        $idv = $_GET["idvehicle"]; ;
        $ret=edit_vehicle($_POST);

       print_r($ret); 
        if ($ret['status']==1){

           header("location: index.php?action=list_vehicles");
        }else{
           
           header("location: index.php?action=editvehicle&error_message=".urlencode($ret['error']));
       

       }

        exit;        
    }break;
    case "delete_vehicle":{
        $idvehicle = $_GET["idvehicle"] ;
        $ret=vehicle_delete();
        header("location: index.php?action=list_vehicles"); 
      
        exit;        
        
    }break;

    
}

?>