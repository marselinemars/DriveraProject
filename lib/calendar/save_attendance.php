<?php               

$event_students= $_POST['event_students'];

// Decode the JSON data into a PHP array
$decodedData = json_decode($event_students, true);

$theID=10;
// Access and process the decoded checkbox data
foreach ($decodedData as $value) {
    // Do something with each checkbox value

    $db->query("INSERT INTO `enrollement`(`StudentID`,`ScheduleID` ) values (?,?)", $value, $theID);

    echo $value ;
 

}










?>
