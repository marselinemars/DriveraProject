<?php

switch($vars['action']){

    
   case "list_payments":{if($_COOKIE['isowner']==1){
    $owner= $db->query('SELECT * FROM theowner ')->fetchAll();
  

 }else{
    $owner = $db->query('SELECT * FROM monitor where email=? and pass=?',$_COOKIE['app_email'],$_COOKIE['app_pass'])->fetchAll();


 }
        $items = $db->query('SELECT * FROM PaymentHistory')->fetchAll();
        $student = $db->query('SELECT * FROM student')->fetchAll();
        $pay = $db->query('SELECT student.fname , student.lname , student.IDS , payment.StudentID ,payment.PaymentID,
                            payment.NextPaymentDate, payment.RemainingAmount ,payment.PaymentDate, payment.PaymentAmount,payment.RowStyle
                           FROM PaymentHistory payment JOIN student ON payment.StudentID = student.IDS')->fetchAll();
                         
        
        include("view/payments.php");

        exit;
    }break;

    

    case "add_payment":{if($_COOKIE['isowner']==1){
        $owner= $db->query('SELECT * FROM theowner ')->fetchAll();
      

     }else{
        $owner = $db->query('SELECT * FROM monitor where email=? and pass=?',$_COOKIE['app_email'],$_COOKIE['app_pass'])->fetchAll();


     }
        include("view/addpayment.php");
        exit;        
        
    }break;

    
    case "do_add_payment":{

        $ret=add_payment($vars);

       print_r($ret); 
        if ($ret['status']==1){

           header("location: index.php?action=list_payments"); 

        }else{
           
           header("location: index.php?action=edit_payment&error_message=".urlencode($ret['error']));
       

       }

        exit;        
    }break;
    
 


    

     
    case "edit_payment":{
        $owner = $db->query('SELECT * FROM theowner ')->fetchAll();
        $idpayment = $_GET["idpayment"];
        include("view/editpayment.php");
        exit;        
        
    }break;
    
    case "do_edit_payment":{
        $idpayment = $_GET["idpayment"]; 
        
        $ret=edit_payment($_POST);

       print_r($ret); 
        if ($ret['status']==1){

           header("location: index.php?action=list_payments");
        }else{
           
           header("location: index.php?action=edit_payment&error_message=".urlencode($ret['error']));
       

       }

        exit;        
    }break;
    
    case "delete_payment":{
        
        $idpayment = $_GET["idpayment"] ;

        $db->query("DELETE from PaymentHistory WHERE PaymentID=$idpayment");
        header("location: index.php?action=list_payments"); 
      
        exit;        
        
    }break;
}
?>

    
    
    
  