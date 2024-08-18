<?php
echo "i'm here";
include("../init.php");

  
    $current_date = date("Y-m-d");
    $futureDate = date("Y-m-d", strtotime("+3 days"));
    echo $current_date;
    $monitors = $db->query('SELECT * FROM monitor ')->fetchAll();
    $vehicles = $db->query('SELECT * FROM vehicle ')->fetchAll();


    for ($i=0;$i<count($monitors);$i++){

        
        if ($monitors[$i]['exp_date'] == $futureDate ) {
            
            make_notification(1, $monitors[$i]['IDM']);
        }
        elseif ($monitors[$i]['exp_date'] == $current_date ){
            make_notification(2, $monitors[$i]['IDM']);
        }
        else{
             continue;
        }

    }

   

    for ($i=0;$i<count($vehicles);$i++){

        if ($vehicles[$i]['InsuranceExpiryDate'] == $futureDate ) {
            make_notification(3, $vehicles[$i]['VehicleID']);
        }
        elseif ($vehicles[$i]['InsuranceExpiryDate'] == $current_date ){
            make_notification(4, $vehicles[$i]['VehicleID']);
        }
        if ($vehicles[$i]['TechnicalInspectionExpiryDate'] == $futureDate ) {
            make_notification(5, $vehicles[$i]['VehicleID']);
        }
        elseif ($vehicles[$i]['TechnicalInspectionExpiryDate'] == $current_date ){
            make_notification(6, $vehicles[$i]['VehicleID']);
        } 
        else{
            continue;
        }


       

    }



    function make_notification($type , $id){
        global $db ;
       

        $db->query("INSERT INTO Notifications (type , ID ) VALUES ( ?, ? ) ", $type, $id );


    }

?>