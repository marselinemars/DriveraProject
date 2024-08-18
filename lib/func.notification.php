<?php

function are_there_notifications(){
    global $db,$appuser;
    
	$num_of_notifications= $db->query("SELECT COUNT(*) AS row_count FROM notifications ")->fetchAll() [0]['row_count'];

   if($num_of_notifications>0){
    return true; 
   }
   else {
    return false ;
    
   }
}

?>