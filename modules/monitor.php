<?php

switch($vars['action']){

    
   case "list_monitors":{

        $items = $db->query('SELECT * FROM monitor')->fetchAll();
        if($_COOKIE['isowner']==1){
            $owner= $db->query('SELECT * FROM theowner ')->fetchAll();
          
   
         }else{
            $owner = $db->query('SELECT * FROM monitor where email=? and pass=?',$_COOKIE['app_email'],$_COOKIE['app_pass'])->fetchAll();
   
   
         }
        include("view/monitors.php");

        exit;
    }break;



    case "add_monitor":{

        include("view/AddMonitor.php");
        exit;        
        
    }break;
    
    case "do_add_monitor":{

        $ret=monitor_add($vars);

       print_r($ret); 
        if ($ret['status']==1){

           header("location: index.php?action=list_monitors"); 

        }else{
           
           header("location: index.php?action=add_monitor&error_message=".urlencode($ret['error']));
       

       }

        exit;        
    }break;
    


       case "monitor_profile":{


        if(isset($vars['ID'])){

            
            $record_index= $db->query('SELECT COUNT(*) AS theindex FROM monitor WHERE IDM <= ? ', $vars['ID'] )->fetchAll();

            $_GET["index"]=$record_index[0]['theindex'] - 1;
            

        }


        $monitor_rows = $db->query('SELECT * FROM monitor ')->fetchAll();
        $index = $_GET["index"] ;
     
          include("view/Monitor_profile.php");
     
             exit;
     
         }break;

         case "monitor_profile_2":{if($_COOKIE['isowner']==1){
            $owner= $db->query('SELECT * FROM theowner ')->fetchAll();
          
   
         }else{
            $owner = $db->query('SELECT * FROM monitor where email=? and pass=?',$_COOKIE['app_email'],$_COOKIE['app_pass'])->fetchAll();
   
   
         }
            $monitor_rows = $db->query('SELECT * FROM monitor where email = ? and pass = ? ', $_COOKIE['app_email'], $_COOKIE['app_pass'])->fetchAll();
            $_GET["index"]=0;
            $index = $_GET["index"] ;
      
         
              include("view/Monitor_profile.php");
            exit;   
       
           }break;
           case "edit_monitor":{if($_COOKIE['isowner']==1){
            $owner= $db->query('SELECT * FROM theowner ')->fetchAll();
          
   
         }else{
            $owner = $db->query('SELECT * FROM monitor where email=? and pass=?',$_COOKIE['app_email'],$_COOKIE['app_pass'])->fetchAll();
   
   
         }
            $idm = $_GET["idm"];
    
            include("view/editMonitor.php");
         
            exit;        
            
        }break;
    
    case "do_edit_monitor":{
        $idm = $_GET["idm"] ;
        $ret=monitor_edit($_POST);

       print_r($ret); 
        if ($ret['status']==1){

           header("location: index.php?action=list_monitors");
        }else{
           
           header("location: index.php?action=edit_monitor&error_message=".urlencode($ret['error']));
       

       }

        exit;        
    }break;
    case "delete_monitor":{
        $idmonitor = $_GET["idmonitor"] ;
        $ret=monitor_delete();
        header("location: index.php?action=list_monitors"); 
      
        exit;        
        
    }break;

    
}

?>