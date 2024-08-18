<?php

switch ($vars['action']) {

    case "exam_list":
        {if($_COOKIE['isowner']==1){
            $owner= $db->query('SELECT * FROM theowner ')->fetchAll();
          
   
         }else{
            $owner = $db->query('SELECT * FROM monitor where email=? and pass=?',$_COOKIE['app_email'],$_COOKIE['app_pass'])->fetchAll();
   
   
         }
            $items = $db->query('SELECT * FROM exam')->fetchAll();
            include("view/exams_list.php");
            generateExamList(); // Call the function to generate the exam list
          
            header("location: index.php?action=exam_list");
            exit;
        }
        break;

     case "add_result":
{
    // Create a new instance of the database connection
    $database = new db('localhost', 'root', '', 'drivera_database');

    // Get the student IDs and results
    $studentIds = $_POST['student_id'];
    $results = $_POST['result'];

    // Iterate over each student ID
    foreach ($studentIds as $index => $studentId) {
        $result = ($results[$index] === 'passed' || $results[$index] === 'failed') ? $results[$index] : '';

        // Sanitize and validate input
        $studentId = intval($studentId);

        // Call the submitResult function for each student ID
        submitResult($studentId, $result);
       
    }

    // Close the database connection
    $database->close();
  
    header("location: index.php?action=exam_list");
    exit;
}
break;
 

}

?>