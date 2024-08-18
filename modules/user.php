<?php

switch($vars['action']){
    
    case 'home':{
        include("view/home.html");
        exit;


    }break;
    
    case "register":{
        
        include("view/register.php");

        exit;
    }break;
    

   
    case "do_register":{

        
        $ret=owner_process_register($vars);
        
        if ($ret['status']==1){
           header("location: index.php?action=owner_profile"); 
        }else{
           header("location: index.php?action=register&error_message=".urlencode($ret['error']));
        }
        exit;
   }break;
    

    case "dashboard":{if($_COOKIE['isowner']==1){
        $owner= $db->query('SELECT * FROM theowner ')->fetchAll();
      

     }else{
        $owner = $db->query('SELECT * FROM monitor where email=? and pass=?',$_COOKIE['app_email'],$_COOKIE['app_pass'])->fetchAll();


     }
        include("view/index3.php");
        exit;

    }break;  
   


    case "login":{

        include("view/login.php");
        exit;

    }break;    

    case "do_login":{

        print_r($vars);

         $ret=user_process_login($vars);
        print_r($ret); 
         if ($ret['status']==1){

            header("location: index.php?action=dashboard"); 

         }else{
            
            header("location: index.php?action=login&error_message=".urlencode($ret['error']));
        

        }
         
         exit;        
    }break;    
    
    case "logout":{
	    setcookie("app_email", "" , -1,"/");
	    setcookie("app_pass", "", -1,"/");        
	    header("location: index.php?action=login"); 
	    exit;
    }break;    
    
}
?>