<?php

switch($vars['action']){

    
    case "Category_Management":{

        if($_COOKIE['isowner']==1){
            $owner= $db->query('SELECT * FROM theowner ')->fetchAll();
          
   
         }else{
            $owner = $db->query('SELECT * FROM monitor where email=? and pass=?',$_COOKIE['app_email'],$_COOKIE['app_pass'])->fetchAll();
   
   
         }
         $items = $db->query('SELECT * FROM Category')->fetchAll();
       
         include("view/Allcategories.php");
 
         exit;
     }break;

     case "toggle_category_status":{

         $categoryId = $_POST["categoryId"];
         $isActive = $_POST["isActive"];

         $db->query("UPDATE Category SET IsActive = ? WHERE CategoryID = ?",  $isActive, $categoryId);
    
        print_r($ret); 
        if ($ret['status']==1){

           header("location: index.php?action=Category_Management");
        }else{
           
           header("location: index.php?action=Category_Management&error_message=".urlencode($ret['error']));
       

       }
    
        exit;
    } break;
    
    
}

?>

