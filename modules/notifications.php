<?php

switch($vars['action']){

    
  case "show_notifications":{
    if($_COOKIE['isowner']==1){
      $owner= $db->query('SELECT * FROM theowner ')->fetchAll();
    

   }else{
      $owner = $db->query('SELECT * FROM monitor where email=? and pass=?',$_COOKIE['app_email'],$_COOKIE['app_pass'])->fetchAll();


   }
    $notifications_about_monitors = $db->query(
      
    'SELECT t1.type , t1.NID, t1.ID , t2.fname , t2.lname
    FROM notifications t1
    JOIN monitor t2 ON t1.ID = t2.IDM
    WHERE t1.type = 1 OR t1.type = 2  ')->fetchAll();

    $notifications_about_vehicles = $db->query(
    'SELECT t1.type , t1.NID, t1.ID , t2.Model 
    FROM notifications t1
    JOIN vehicle t2 ON t1.ID = t2.VehicleID
    WHERE t1.type = 3 OR t1.type = 4 OR t1.type = 5 OR t1.type = 6 ')->fetchAll();

    
    
     include("view/notifications.php");

        exit;

    }break;
    

    case "delete_notification":{

      $NID = $vars['id'];
      $db->query("DELETE from notifications WHERE NID= $NID");
      
      header("location: index.php?action=show_notifications");
  
          exit;
  
      }break;


}

?>